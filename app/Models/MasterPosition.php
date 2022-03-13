<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterPosition extends Model
{
    use HasFactory;

    protected $table = "master_positions";

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'code',
        'name',
    ];

    const RULE = [
        'code' => 'required',
        'name' => 'required',
        'name' => 'unique:master_positions'
    ];

    const RULE_MESSAGE = [
        'code.required' => 'kode tidak boleh kosong',
        'name.required' => 'nama tidak boleh kosong',
        'name.unique' => 'nama sudah digunakan',
    ];

    public function getPosition($id){
        $data = MasterPosition::where('id','=',$id)->get();
        return $data;
    }
}
