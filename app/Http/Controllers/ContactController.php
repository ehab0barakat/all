<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth ;
use App\Models\Contact ;
use App\Models\User ;
use App\Models\Contact_Number;
use Illuminate\Database\Eloquent\Collection ;

use Illuminate\Support\Facades\Validator;


class ContactController extends Controller
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



    public function store(Request $request )
    {
        $request->validate([
            "number" => ["required" , "numeric" , "regex:/^(010|011|012)/"  , 'unique:App\Models\Contact_Number,mobile_num' , "digits:11" ]
        ]);


        auth::user()->contact->number()->create([
            "contact_id" => auth::id() ,
            "mobile_num" => $request->number ,
            "address" => $request->naddress
        ]);

        return redirect()->route("contact.index");
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
    public function edit($id)
    {
        return view("contact.edit"  , ["contact" => Contact_Number::where("mobile_num",$id)->first() ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        Contact_Number::where("mobile_num",$id)->update([
            "mobile_num" =>$request->number ,
            "address" => $request->naddress
        ]);
        return redirect()->route("contact.index");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact_Number::where('mobile_num', $id)->delete();
        return redirect()->route("contact.index"); ;
    }
}
