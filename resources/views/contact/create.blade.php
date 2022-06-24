@extends("layouts.app") ;

@section("header")
new post
@endsection



@section("content")

{!! Form::open(['route' => 'contact.store' , "class" => "container"]) !!}

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">address For Number</label>
      {!! Form::text('naddress', null , ["class" => "form-control" ]   ); !!}
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Number</label>
      {!! Form::text('number', null, ["class" => "form-control"]); !!}
    </div>

    <button type="submit" class="btn btn-primary text-dark">Submit</button>

{!! Form::close() !!}

    @endsection
