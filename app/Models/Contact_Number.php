<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Contact_Number extends Model
{
    use HasFactory;

    protected $table = 'contacts_mobiles';
    protected $primaryKey ='contact_id' ;


    public function Contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function getRouteKeyName()
    {
    return "asdasd";
}

}
