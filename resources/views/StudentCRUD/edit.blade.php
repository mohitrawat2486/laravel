@extends('layouts.default')
 
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit New Item</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('studentCRUD.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::model($student, ['method' => 'PATCH','route' => ['studentCRUD.update', $student->student_id]]) !!}
	
    <div class="row">

       <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{Form::label('name', 'Name')}}:</strong>
               {{Form::text('Name',null,array('id' => 'name'))}}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{Form::label('email', 'Email')}}:</strong>
                {{Form::text('Email',null)}}
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{Form::label('age', 'Age')}}:</strong>
                {{Form::select('Age', array(''=>'Select Age','20' => '20', '21' => '21'))}}
            </div>
        </div>
		
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{Form::label('contactno', 'Contact No.')}}:</strong>
                {{Form::text('ContactNo', null,array('maxlength'=>10))}}
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{Form::label('address', 'Address')}}:</strong>
                {{Form::text('Address',null,array('rows'=>5,'cols'=>10))}}
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </div>
    {!! Form::close() !!}

@endsection