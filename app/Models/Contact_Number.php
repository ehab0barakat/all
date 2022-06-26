<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Contact;

class Contact_Number extends Model
{
    use HasFactory;

    protected $table = 'contacts_mobiles';
    protected $primaryKey ='contact_id' ;


    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

// * @return string

    // public function getRouteKeyName()
    // {
    // return "asdasd";
// }

}
