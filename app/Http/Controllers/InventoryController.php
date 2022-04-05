<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory as Inventory;
use App\Models\inventories_kasi as Kasi;
use App\Models\inventory_staf as Staf;
use App\Models\MasterPosition as MasterPosition;
use Carbon\Carbon;
use Validator;

class InventoryController extends Controller
{
    public function apiNewInventory(Request $request){
        $user = auth()->user();

        $data = $request->only('no_letter','from','subject','status','letter_date','file');
        $validation = Validator::make($data, Inventory::RULE, Inventory::RULE_MESSAGE);
        if($validation->fails()){
            return $this->response->invalidation($validation->errors()->first());
        }

        if($file=$request->file('file')){
            //store file into document folder
            $file = $request->file->store('public/files');

            $dateNow = Carbon::now('UTC')->toDateTimeString();
            $inventory = Inventory::whereDate('created_at', Carbon::today())->get();
            $inventoryCount = $inventory->count()+1;
            $date = Carbon::parse($dateNow)->format('d/m/Y');
            

            $newData = new Inventory();
            $newData->no_letter = $request->no_letter;
            $newData->no_agenda = "$inventoryCount/$date";
            $newData->from = $request->from;
            $newData->subject = $request->subject;
            $newData->type = $request->type;
            $newData->status = $request->status;
            $newData->letter_date = $request->letter_date;
            $newData->implementation_date = $request->implementation_date;
            $newData->implementation_place = $request->implementation_place;
            $newData->implementation_value = $request->implementation_value;
            $newData->implementation_note = $request->implementation_note;
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

        $kasiBefore = Kasi::where('inventory_id', $id)->get();
        if($kasiBefore->count()==0){
            //Update data inventory, filled disposisi_to_kasi_by and disposisi_to_kasi_at
            $inventory->update(
                [
                    'disposisi_to_kasi_by' => $user->id,
                    'disposisi_to_kasi_at' => Carbon::now('UTC'),
                    'progress' => 2
                ]
            );
        }else{
            Kasi::where('inventory_id', $id)->delete();
            $inventory->update(
                [
                    'disposisi_to_kasi_by' => $user->id,
                    'disposisi_to_kasi_at' => Carbon::now('UTC'),
                ]
            );
        }

        foreach($request->kasi as $kasi){
            $inventory->kasi()->attach($kasi['id']);
        }


        return $this->response->success("Berhasil melakukan disposisi ke Kasi", 
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
                'staf.division'])->find($id));
    }

    public function apiDispoToStaf($id, Request $request){
        $inventory = Inventory::find($id);

        $user = auth()->user();

        $stafBefore = Kasi::where('inventory_id', $id)->get();
        if($stafBefore->count()==0){
            $inventory->update(
                [
                    'disposisi_to_staf_by' => $user->id,
                    'disposisi_to_staf_at' => Carbon::now('UTC'),
                    'progress' => 3
                ]
            );
        }else{
            Staf::where('inventory_id', $id)->delete();
            $inventory->update(
                [
                    'disposisi_to_staf_by' => $user->id,
                    'disposisi_to_staf_at' => Carbon::now('UTC'),
                ]
            );
        }

        foreach($request->staf as $staf){
            $inventory->staf()->attach($staf['id']);
        }

        return $this->response->success("Berhasil melakukan disposisi ke Staf", 
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
                'staf.division'])->find($id));
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
                'staf.division'])->find($id));
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
        return $this->response->success("Berhasil mendapatkan daftar inventory", Inventory::with([
            'disposisi_to_kasi_by.position',
            'disposisi_to_kasi_by.division',
            'disposisi_to_staf_by.position',
            'disposisi_to_staf_by.division',
            'notulen_created_by.position',
            'notulen_created_by.division',
            'kasi.position',
            'kasi.division',
            'staf.position',
            'staf.division'])->get());
    }

    public function apiGetInventoriesByProgress(Request $request){
        $data = Inventory::with([
            'disposisi_to_kasi_by.position',
            'disposisi_to_kasi_by.division',
            'disposisi_to_staf_by.position',
            'disposisi_to_staf_by.division',
            'notulen_created_by.position',
            'notulen_created_by.division',
            'kasi.position',
            'kasi.division',
            'staf.position',
            'staf.division'])->where('progress', $request->progress)->orderBy('created_at','desc')->get();
        return $this->response->success("Berhasil mendapatkan daftar inventory", $data);
    }

    public function apiGetOwnInventory(Request $request){
        $user = auth()->user();
        
        $position = MasterPosition::where('id', $user->position_id)->first();

        if($position->code=='Kasi'){
            $data = Kasi::with(['inventory'])->where('account_id',$user->id)->get();
            return $this->response->success("Berhasil mendapatkan daftar inventory", $data);
        }else if($position->code=='Staf'){
            $data = Staf::with(['inventory'])->where('account_id',$user->id)->get();
            return $this->response->success("Berhasil mendapatkan daftar inventory", $data);
        }
    }


}
