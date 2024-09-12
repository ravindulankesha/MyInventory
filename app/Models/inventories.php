<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventories extends Model
{
    use HasFactory;
    protected $fillable = ['item_name', 'item_description', 'quantity_per_unit'];
}
