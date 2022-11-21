<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subpurchase extends Model
{
    use HasFactory;
    protected $guarded=[];  

    public function adpurchase()
    {
        return $this->belongsTo(Purchase::class,'purchase_id','id');
    }
}
