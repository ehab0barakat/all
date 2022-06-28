<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth ;
use App\Models\Contact ;
use App\Models\User ;
use App\Models\Contact_Number;
use Illuminate\Database\Eloquent\Collection ;

use Illuminate\Support\Facades\Validator;
use App\Policies;


class ContactNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("contact.index" ,  ["contacts_number" => auth::user()->contact->number ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("contact.create") ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */



    public function store(Request $request  )
    {
        $request->validate([
            "number" => ["required" , "numeric" , "regex:/^(010|011|012)/"  , 'unique:App\Models\Contact_Number,mobile_num' , "digits:11" ]
        ]);

        auth::user()->contact->number()->create([
            "contact_id" => auth::id() ,
            "mobile_num" => $request->number ,
            "address" => $request->naddress
        ]);

        return redirect()->route("contact_number.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact_Number $contact_number)
    {

        $this->authorize('update', $contact_number);

        return view("contact.edit"  , ["contact" => $contact_number]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact_Number $contact_number)
    {

        $contact_number->where("mobile_num",$contact_number->mobile_num)->update([
            "mobile_num" =>$request->number ,
            "address" => $request->naddress
        ]);
        return redirect()->route("contact_number.index");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact_Number $contact_number)
    {
        $contact_number->where("mobile_num",$contact_number->mobile_num)->delete();
        return redirect()->route("contact_number.index"); ;
    }
}
