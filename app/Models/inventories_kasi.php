<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventories_kasi extends Model
{
    use HasFactory;

    protected $table = "inventory_kasi";

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [];

    public function inventory() {
        $data = $this->belongsTo('App\Models\Inventory', 'inventory_id', 'id');
        return $data;
    }
    
}
