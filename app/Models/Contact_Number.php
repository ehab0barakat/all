<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Contact;

class Contact_Number extends Model
{

    public function getRouteKeyName()
{
    return "mobile_num";
}

    use HasFactory;

    protected $table = 'contacts_mobiles';
    protected $primaryKey ='contact_id' ;
    protected $fillable = ["contact_id", "mobile_num","address"];


    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

public function contact_auth()
{
    return $this->belongsTo(User::class , "contact_id");
}

}
