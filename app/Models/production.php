<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class production extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function production_details(){
        return $this->hasMany(productiondetail::class,'production_id','id');
    }

}
