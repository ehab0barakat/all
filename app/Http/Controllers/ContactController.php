<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth ;
use App\Models\Contact ;
use App\Models\Contact_Number;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $id = auth()->user()->id;
        return view("contact.index" ,  ["contacts_number" => Contact_Number::where("contact_id", $id)->get()]);
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



    public function store(Request $request)
    {

        $contact_Number = new Contact_Number();
        $contact_Number->contact_id = auth()->user()->id;
        $contact_Number->mobile_num = $request->number ;
        $contact_Number->address = $request->naddress ;
        $contact_Number->save();

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
        Contact_Number::where('mobile_num', $id)->delete();
        return redirect()->route("contact.index"); ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view("contact.edit"  , ["id" => $id]);
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
        $new = Contact_Number::where("mobile_num",$id)->update([
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
        return "fghjk";
        // dd($id);

        // return redirect()->route("contact.index");
    }
}
