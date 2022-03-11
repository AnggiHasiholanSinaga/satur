<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory as Inventory;
use Validator;

class InventoryController extends Controller
{
    public function apiNewInventory(Request $request){
        $data = $request->only('no_letter','no_agenda','from','subject','status','letter_date','file');
        $validation = Validator::make($data, Inventory::RULE, Inventory::RULE_MESSAGE);
        if($validation->fails()){
            return $this->response->invalidation($validation->errors()->first());
        }

        if($file=$request->file('file')){
            //store file into document folder
            $file = $request->file->store('public/files');

            $newData = new Inventory();
            $newData->no_letter = $request->no_letter;
            $newData->no_agenda = $request->no_agenda;
            $newData->from = $request->from;
            $newData->subject = $request->subject;
            $newData->status = $request->status;
            $newData->letter_date = $request->letter_date;
            $newData->file = str_replace("public","storage",$file);
            $newData->save();
            return $this->response->success("Berhasil menambahkan surat baru", $newData);
        }
    }
}
