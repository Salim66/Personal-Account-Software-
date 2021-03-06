<?php

namespace App\Models;

use App\Models\Business;
use App\Models\Person;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Investment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function business(){
        return $this->belongsTo(Business::class);
    }

    public function person(){
        return $this->belongsTo(Person::class);
    }

}
