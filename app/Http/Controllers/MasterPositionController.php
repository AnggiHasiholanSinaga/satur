<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterPosition as Position;
use Validator;

class MasterPositionController extends Controller
{
    public function __construct() {
        parent::__construct();
    }

    public function apiGetPosition(){
        $data = Position::get();
        return $this->response->success("Berhasil mendapatkan daftar jabatan", $data);
    }

    public function apiNewPosition(Request $request){
        $data = $request->only('code','name');
        $validation = Validator::make($data, Position::RULE, Position::RULE_MESSAGE);
        if($validation->fails()){
            return $this->response->invalidation($validation->errors()->first());
        }

        $newData = Position::create($data);
        return $this->response->success("Berhasil menambahkan jabatan baru", $newData);
    }
}
