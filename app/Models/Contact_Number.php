<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact_Number extends Model
{
    use HasFactory;

    protected $table = 'contacts_mobiles';
    protected $primaryKey ='contact_id' ;
    

}
