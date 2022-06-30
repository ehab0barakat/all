<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Contact_Number;
use Illuminate\Http\Request;
use App\Http\Resources\ContactResource;
use App\Http\Resources\ContactCollection;
use Auth ;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contact ;
use App\Models\User ;
use Illuminate\Database\Eloquent\Collection ;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return ContactResource::collection(Contact_Number::all());
        return new ContactCollection(Contact_Number::all());
        // return  Contact_Number::select("mobile_num")->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , Contact_Number $contact_number )
    {
        
        $contact_number->create([
            "contact_id"=> Auth::id() ,
            "mobile_num"=> $request->mobile_num ,
            "address" => $request->address
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact_Number  $contact_Number
     * @return \Illuminate\Http\Response
     */
    public function show(Contact_Number $contact_Number , $id)
    {
        return new ContactResource($contact_Number->where("mobile_num" , $id)->first()) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact_Number  $contact_Number
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact_Number $contact_Number)
    {

        $contact_Number->where("mobile_num",$id)->update([
            "mobile_num" =>$request->mobile_num ,
            "address" => $request->address
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact_Number  $contact_Number
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact_Number $contact_Number , $id)
    {
        $contact_Number->where("mobile_num",$id)->delete();
    }

}
