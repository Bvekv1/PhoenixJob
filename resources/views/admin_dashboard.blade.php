@extends('layout.admin_layout')
@section('content')

<div class="col p-4">
<div class="container">
    <ul class="list-group">
        <li class="list-group-item active">Job List</li>
        <li class="list-group-item ">
            <div class="row">
            @if(isset($jobList))
                        @foreach($jobList as $jobsList)
            <div class="col-md-9">
                <h1>{{$jobsList->jobTitle}}<h1>
            </div>
            <div class="col-md-3">
                <div href="#" class="btn btn-success">Edit</div>
                <div href="{{route(delete_job)/$jobsList->$jobId}}" class="btn btn-danger">Delete</div>
            </div>
            @endforeach
            @endif
            </div>
        </li>
    </ul>
    </div>
</div>

@endsection