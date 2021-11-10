<?php
/**
 * Created by PhpStorm.
 * User: lijia
 * Date: 2018/11/03
 * Time: 21:46
 */

namespace App\Services;


use App\Events\LostSendEvent;
use App\Events\LostUploadEvent;
use App\Events\TemplateSendEvent;
use App\Events\UserDataUpdateEvent;
use App\Events\UserPhoneEvent;
use App\Listeners\LostSendListener;
use App\Models\Admin;
use App\Models\Lost;
use App\Models\TemplateSender;
use App\Models\UserWeChatOfficialAccount;
use App\Services\QiniuService;
use App\Services\Education\StudentService;
use Carbon\Carbon;

class LostService
{
    /**
     * 审核失物通过
     * @param Lost $lost
     * @return array
     */
    public static function allowAudit(Lost $lost){
        $lost->status = Lost::getStatus('已审核');
        $lost->save();
        //通知审核通过
        if($wechat=UserWeChatOfficialAccount::where('number',$lost->publish)->first()){
            $template=new TemplateSender();
            $template->open_id=$wechat->open_id;
            $template->number=$wechat->number;
            $template->template='lost_result';
            $template->template_id=config('wechat.template.lost_result');
            $template->setMessage([
                'first' => '您好，你的招领发布已审核完毕',
                'keyword1' => $lost->description,
                'keyword2' => '审核通过',
                'remark' => '计协小哥感谢你的贡献，拾金不昧，从这里开始',
            ]);
            $template->status=TemplateSender::getStatus('等待发送');
            $template->save();
            event(new TemplateSendEvent($template));
        }
        //发送模板消息到失主
        event(new LostSendEvent($lost));
        $result = [
            'code' => 200,
            'message' => '审核成功通过',
        ];
        return $result;
    }
    /**
     * 审核失物不通过
     * @param Lost $lost
     * @return array
     */
    public static function disallowAudit(Lost $lost){
        $lost->status = Lost::getStatus('审核不通过');
        $lost->save();
        //通知审核不通过
        if($wechat=UserWeChatOfficialAccount::where('number',$lost->publish)->first()){
            $template=new TemplateSender();
            $template->open_id=$wechat->open_id;
            $template->number=$wechat->number;
            $template->template='lost_result';
            $template->template_id=config('wechat.template.lost_result');
            $template->setMessage([
                'first' => '您好，你的招领发布已审核完毕',
                'keyword1' => $lost->description,
                'keyword2' => '审核不通过',
                'remark' => '对不起，你的发布审核不通过，请检查失物图片是否能够看清楚学号信息',
            ]);
            $template->status=TemplateSender::getStatus('等待发送');
            $template->save();
            event(new TemplateSendEvent($template));
        }
        //发送模板消息到失主
        $result = [
            'code' => 200,
            'message' => '审核成功不通过',
        ];
        return $result;
    }
    /**
     * 发布失物招领
     * @param $publisher
     * @param $mediaId
     * @param $description
     * @param $number
     * @param $shortNumber
     * @param $cellphone
     * @return array|bool
     */
    public static function wechatPublish($publisher, $mediaId, $description, $number, $shortNumber, $cellphone)
    {
        //验证信息
        $result = self::check($publisher, $number, $description);
        if ($result === true) {
            $lost = self::publish($publisher, $description, $number);
            $lost->phone = $cellphone;
            event(new UserPhoneEvent($publisher,$shortNumber,$cellphone));
            $lost->cover = self::wechatUploadImage($mediaId);
            $admin = Admin::where('number', $publisher)->first();
            //如果是管理员发布，则直接执行发布指令
            if ($admin && $admin->checkPermission('发布失物招领')) {
                $lost->role = Lost::getRole('膳管会');
                $lost->status = Lost::getStatus('已审核');
                $lost->save();
                event(new LostSendEvent($lost));
                $result = [
                    'code' => 200,
                    'message' => '感谢' . $admin->name . '的辛苦工作',
                ];
            } else {
                $lost->role = Lost::getRole('学生');
                $lost->status = Lost::getStatus('未审核');
                $lost->save();
                event(new LostUploadEvent($lost));
                $result = [
                    'code' => 200,
                    'message' => '感谢你的拾金不昧'
                ];
            }
        }
        return $result;
    }

    /**
     * 生成发布失物
     * @param $publisher
     * @param $description
     * @param null $number
     * @return Lost
     */
    public static function publish($publisher, $description, $number = null)
    {
        $lost = new Lost();
        $lost->publish = $publisher;
        $lost->description = $description;
        //判断是否有确认人员
        if (!empty($number)) {
            $lost->number = $number;
            //自动填充学号和班级信息
            $data = StudentService::getUserData($number);
            $lost->name = $data['name'];
            $lost->class = $data['class'];
            event(new UserDataUpdateEvent($data));
        }
        return $lost;
    }

    /**
     * 检查是否符合条件发布
     * @param $publisher
     * @param $number
     * @param $description
     * @return array|bool
     */
    private static function check($publisher, $number, $description)
    {
        $admin=Admin::where('number',$publisher)->first();
        if (Lost::where('number', $number)->where('description', $description)->whereDate('created_at', Carbon::today()->toDateString())->first()) {
            return [
                'code' => 401,
                'message' => '该招领今天已发布'
            ];
        }else if($admin && $admin->checkPermission('发布失物招领')){
            return true;
        } else if (Lost::where('publish', $publisher)->where('status', '!=', Lost::getStatus('审核不通过'))->whereDate('created_at', Carbon::today()->toDateString())->count()) {
            return [
                'code' => 401,
                'message' => '一天只能发一次失物招领'
            ];
        } else if (StudentService::checkIsClassMate($publisher, $number)) {
            return [
                'code' => 401,
                'message' => '这是同班同学'
            ];
        }
        return true;
    }

    /**
     * 微信上传图片
     * @param $media_id
     * @return null|string
     */
    public static function wechatUploadImage($media_id)
    {
        if (!$media_id) {
            return null;
        }
        $name = self::generateFileName($media_id);
        $content = WeChatService::downloadImageStream($media_id);
        return self::uploadImage($name, $content);
    }

    /**
     * 常规上传图片
     * @param $content
     * @return string
     */
    private static function fileUploadImage($content)
    {
        $name = self::generateFileName();
        return self::uploadImage($name, $content);
    }

    /**
     * 上传图片
     * @param $name
     * @param $content
     * @return string
     */
    public static function uploadImage($name, $content)
    {
        return QiniuService::put($name, $content);
    }

    /**
     * 生成文件名
     * @param null $media_id
     * @return string
     */
    private static function generateFileName($media_id = null)
    {
        if (empty($media_id)) {
            return 'lost/' . ToolsService::getRandomString(64) . '.png';
        } else {
            return 'lost/' . $media_id . '.png';
        }
    }
}
