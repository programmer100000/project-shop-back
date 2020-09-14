<?php

namespace App\Http\Controllers;

use App\slider;
use Illuminate\Http\Request;

class maincontroller extends Controller
{
    public function getslider(){
        $slider = slider::all();
        return json_encode($slider);
    }
}
