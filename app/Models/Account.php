<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $table = 'accounts';

    protected $hidden = [
        'password',
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'username',
        'name',
        'nip',
        'position_id',
        'division_id',
        'password'
    ];

    const RULE = [
        'username' => 'required|regex:/^[a-z1234567890_]+$/u|max:255|unique:accounts',
        'name' => 'required',
        'division_id' => 'required|numeric',
        'position_id' => 'required|numeric',
        'password' => 'required'
    ];

    const RULE_MESSAGE = [
        'username.required' => 'username tidak boleh kosong',
        'username.regex' => 'username hanya bisa diisi huruf (a-z), angka dan underscore (_)',
        'username.unique' => 'username sudah digunakan',
        'name.required' => 'nama tidak boleh kosong',
        'division_id.required' =>  'ID Divisi tidak boleh kosong',
        'position_id.required' =>  'ID Jabatan tidak boleh kosong',
        'password.required' => 'kata sandi tidak boleh kosong'
    ];

}
