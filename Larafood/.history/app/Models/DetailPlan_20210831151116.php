<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPlan extends Model
{
    use HasFactory;
    protected $table = 'detail_plans';

    public function plan(){
        return $this->belongsTo(Plan::class);
    }

}
