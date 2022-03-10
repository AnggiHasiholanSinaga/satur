<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterDivision as Division;
use Validator;

class MasterDivisionController extends Controller
{

    public function __construct() {
        parent::__construct();
    }

    public function apiGetDivision(){
        $data = Division::get();
        return $this->response->success("Berhasil mendapatkan daftar divisi", $data);
    }

    public function apiNewDivision(Request $request){
        $data = $request->only('name');
        $validation = Validator::make($data, Division::RULE, Division::RULE_MESSAGE);
        if($validation->fails()){
            return $this->response->invalidation($validation->errors()->first());
        }

        $newData = Division::create($data);
        return $this->response->success("Berhasil menambahkan divisi baru", $newData);
    }
}
