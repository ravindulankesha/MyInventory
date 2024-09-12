<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $fillable = ['inventory_item_id','total_quantity'];

    public function inventories()
   {
       return $this->belongsTo(inventories::class,'inventory_item_id');
   }
}
