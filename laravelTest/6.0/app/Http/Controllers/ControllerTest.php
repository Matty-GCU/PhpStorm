<?php

namespace App\Http\Controllers;

class ControllerTest extends Controller
{
    public function getAuthName() {
        dump('wu hang');
        dump('12138');
    }

    public function sayHello($nameOfGuest) {
        return 'Hi~ Dear '.$nameOfGuest.".";
    }
}
