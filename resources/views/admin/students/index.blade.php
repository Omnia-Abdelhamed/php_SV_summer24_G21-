@extends('admin.layouts.app')
@section('breadCrumb')
<div class="page-breadcrumb">
    <div class="row">
      <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title">Students</h4>
        <div class="ms-auto text-end">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">
              <a href="#" class="active">Students</a></li>
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('content')
<div class="card">
    @if(Session::has('msg'))
    <div class="alert alert-success">
        {{ Session::get('msg') }}
    </div>
    @endif
    <div class="card-body">
        <h5 class="card-title">Basic Datatable</h5>
        <div class="table-responsive">
        <table
            id="zero_config"
            class="table table-striped table-bordered"
        >
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Photo</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td><img src="{{ asset('storage')."/$student->photo" }}" width="70" height="70"></td>
                    <td>
                        <a href="#" class="btn btn-outline-primary">show</a>
                        <a href="{{ route('admin.students.edit',$student->id) }}" class="btn btn-outline-success">edit</a>
                        <form action="{{ route('admin.students.destroy',$student->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <input type="submit" value="delete" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  </div>
@endsection
