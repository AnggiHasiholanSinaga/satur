<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $table = 'inventories';

    protected $hidden = [];

    protected $fillable = [
        'no_letter',
        'no_agenda',
        'from',
        'subject',
        'status',
        'letter_date',
        'file'
    ];

    const RULE = [
        'no_letter' => 'required',
        'no_agenda' => 'required',
        'from' => 'required',
        'subject' => 'required',
        'status' => 'required',
        'letter_date' => 'required|date_format:Y-m-d',
        'file' => 'required|mimes:pdf|max:5120'
    ];

    const RULE_MESSAGE = [
        'no_letter.required' => 'nomer surat tidak boleh kosong',
        'no_agenda.required' => 'nomer agenda tidak boleh kosong',
        'from.required' => 'asal surat tidak boleh kosong',
        'subject.required' => 'perihal surat tidak boleh kosong',
        'status.required' => 'status surat tidak boleh kosong',
        'letter_date.required' => 'tanggal surat tidak boleh kosong',
        'letter_date.date_format' => 'format tanggal surat tidak sesuai',
        'file.required' => 'file surat tidak boleh kosong',
        'file.mimes' => 'file surat tidak sesuai',
        'file.max' => 'ukuran file terlalu besar (max: 5mb)'
        
    ];

}
