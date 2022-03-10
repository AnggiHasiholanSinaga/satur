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
        'name',
    ];

    const RULE = [
        'name' => 'required',
        'name' => 'unique:master_positions'
    ];

    const RULE_MESSAGE = [
        'name.required' => 'nama tidak boleh kosong',
        'name.unique' => 'nama sudah digunakan',
    ];
}
