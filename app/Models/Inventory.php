<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $table = 'inventories';

    protected $hidden = ['pivot'];

    protected $fillable = [
        'no_letter',
        'no_agenda',
        'from',
        'subject',
        'status',
        'letter_date',
        'implementation_date',
        'implementation_place',
        'implementation_note',
        'file',
        'created_by',
        'disposisi_to_kasi_by',
        'disposisi_to_kasi_at',
        'disposisi_to_staf_by',
        'disposisi_to_staf_at',
        'notulen',
        'notulen_created_by',
        'notulen_created_at',
        'progress'
    ];

    const RULE = [
        'no_letter' => 'required|unique:inventories',
        'no_agenda' => 'required',
        'from' => 'required',
        'subject' => 'required',
        'status' => 'required',
        'letter_date' => 'required|date_format:Y-m-d',
        'file' => 'required|mimes:pdf|max:5120'
    ];

    const RULE_MESSAGE = [
        'no_letter.required' => 'nomer surat tidak boleh kosong',
        'no_letter.unique' => 'nomer surat sudah tersedia',
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

    public function kasi() {
        $kasi = $this->belongsToMany('App\Models\Account', 'inventory_kasi', 'inventory_id', 'account_id');
        return $kasi;
    }

    public function staf() {
        $staf = $this->belongsToMany('App\Models\Account', 'inventory_staf', 'inventory_id', 'account_id');
        return $staf;
    }

    public function disposisi_to_kasi_by() {
        $staf = $this->belongsTo('App\Models\Account', 'disposisi_to_kasi_by', 'id');
        return $staf;
    }

    public function disposisi_to_staf_by() {
        $staf = $this->belongsTo('App\Models\Account', 'disposisi_to_staf_by', 'id');
        return $staf;
    }

    public function notulen_created_by() {
        $staf = $this->belongsTo('App\Models\Account', 'created_notulen_by', 'id');
        return $staf;
    }

}
