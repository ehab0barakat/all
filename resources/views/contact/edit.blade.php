@extends("layouts.app") ;



{{ <?php use App\Models\Contact_Number; ?>}}

{{ $contact = Contact_Number::where("mobile_num",$id)->first()}}

@section("content")

{!! Form::open(['route' => ['contact.update' , $id ]  , "class" => "container" , "method" => "put"]) !!}

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">address For Number</label>
      {!! Form::text('naddress', null , ["class" => "form-control" , "placeholder" => $contact->address]   ); !!}
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Number</label>
      {!! Form::text('number', null, ["class" => "form-control" ,"placeholder" => $contact->mobile_num]); !!}
    </div>

    <button type="submit" class="btn btn-primary text-dark">Submit</button>

{!! Form::close() !!}

    @endsection
