<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory as Inventory;
use Carbon\Carbon;
use Validator;

class InventoryController extends Controller
{
    public function apiNewInventory(Request $request){
        $user = auth()->user();

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
            $newData->progress = 1;
            $newData->created_by = $user->id;
            $newData->save();
            return $this->response->success("Berhasil menambahkan surat baru", $newData);
        }
    }

    public function apiDispoToKasi($id, Request $request){
        $inventory = Inventory::find($id);

        $user = auth()->user();
        //Update data inventory, filled disposisi_to_kasi_by and disposisi_to_kasi_at
        $inventory->update(
            [
                'disposisi_to_kasi_by' => $user->id,
                'disposisi_to_kasi_at' => Carbon::now('UTC'),
                'progress' => 2
            ]
        );

        foreach($request->kasi as $kasi){
            $inventory->kasi()->attach($kasi['id']);
        }

        return $this->response->success("Berhasil melakukan disposisi ke Kasi", 
            Inventory::with(['kasi.position','kasi.division'])
                ->find($id));
    }

    public function apiDispoToStaf($id, Request $request){
        $inventory = Inventory::find($id);

        $user = auth()->user();
        //Update data inventory, filled disposisi_to_staf_by and disposisi_to_staf_at
        $inventory->update(
            [
                'disposisi_to_staf_by' => $user->id,
                'disposisi_to_staf_at' => Carbon::now('UTC'),
                'progress' => 3
            ]
        );

        foreach($request->staf as $staf){
            $inventory->staf()->attach($staf['id']);
        }

        return $this->response->success("Berhasil melakukan disposisi ke Staf", 
            Inventory::with(['kasi.position','kasi.division','staf.position','staf.division'])
                ->find($id));
    }

    public function apiAddNotulen($id, Request $request){
        $inventory = Inventory::find($id);

        $user = auth()->user();
        //Update data inventory, filled notulen_created_by, notulen_created_at, notulen
        $inventory->update(
            [
                'notulen_created_by' => $user->id,
                'notulen_created_at' => Carbon::now('UTC'),
                'notulen' => $request->notulen,
                'progress' => 4
            ]
        );

        return $this->response->success("Berhasil menambahkan notulen", 
            Inventory::with(['kasi.position','kasi.division','staf.position','staf.division'])
                ->find($id));
    }

    public function apiGetInventory($id, Request $request){
        return $this->response->success("Berhasil mendapatkan data inventory", 
            Inventory::with([
                'disposisi_to_kasi_by.position',
                'disposisi_to_kasi_by.division',
                'disposisi_to_staf_by.position',
                'disposisi_to_staf_by.division',
                'notulen_created_by.position',
                'notulen_created_by.division',
                'kasi.position',
                'kasi.division',
                'staf.position',
                'staf.division']
            )->find($id));
    }

    public function apiGetInventories(Request $request){
        return $this->response->success("Berhasil mendapatkan daftar inventory", Inventory::get());
    }

    public function apiGetInventoriesByProgress(Request $request){
        $data = Inventory::where('progress', $request->progress)->orderBy('letter_date','desc')->get();
        return $this->response->success("Berhasil mendapatkan daftar inventory", $data);
    }


}
