@extends('master')
 
@section('container')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Items CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('studentCRUD.create') }}"> Add Student</a>
            </div>
        </div>
    </div>
	@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered" border>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th colspan="3">Action</th>
        </tr>
    @foreach ($students as $key => $student)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $student->Name }}</td>
        <td>{{ $student->Email }}</td>
        <td><a class="btn btn-info" href="{{route('studentCRUD.show',$student->student_id)}}">Show</a></td>
        <td><a class="btn btn-primary" href="{{route('studentCRUD.edit',$student->student_id)}}">Edit</a></td>
		<td>{!! Form::open(['method' => 'DELETE','route' => ['studentCRUD.destroy', $student->student_id], 'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>

@endsection