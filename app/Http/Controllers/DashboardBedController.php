<?php

namespace App\Http\Controllers;

use App\Events\WebHookJakConnected;
use App\Models\Dashboard\Dashboard;
use Illuminate\Database\Eloquent\JsonEncodingException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DashboardBedController extends Controller
{
    public $ketersediaanBed;

    public function __construct(KetersediaanBedController $ketersediaanBed) {
        $this->ketersediaanBed = $ketersediaanBed;
    }

    public function index(Request $request){
        $bed = $this->ketersediaanBed->index();
        $avRanap = json_decode(json_encode($bed->data->ranap_dewasa->ketersediaan));
        return view('dashboard.index', compact('bed', 'avRanap'));
    }

    public function status(Request $request){
        $data = json_encode($request->all());
        event(new WebHookJakConnected($data));
        return "Berhasil Guyzz ke Zikri";
    }
}
