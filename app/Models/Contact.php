<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use App\Models\Contact_Number;

class Contact extends Model
{
    use HasFactory;



    public function number()
    {
        return $this->hasMany(Contact_Number::class);
    }
}
