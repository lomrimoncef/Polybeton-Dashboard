<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retour extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function payment(){
        return $this->belongsTo(Payment::class,'id','retour_id');
    }

    public function retour_details(){
        return $this->hasMany(RetourDetail::class,'retour_id','id');
    }




}
