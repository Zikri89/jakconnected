<?php

namespace App\Http\Controllers;

use App\Utils\JakConnected;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class KetersediaanBedController extends Controller
{
    public function index(){
        $res = new JakConnected(new Client());
        $result = $res->getKetersediaanBed();
        $data = json_decode($result);
        return $data;
    }

    public function merge() {
        return "test";
    }
}
