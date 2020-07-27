@extends('layout.admin_layout')
@section('content')
    <div class="col p-4">
    @if(isset($getjobapplicant))
                        @foreach($getjobapplicant as $getappliedapplicants)
        <div class="container">
            <div class="card mb-3">
                <div class="card-header text-right">
                    <div class="text-left">
                        <i class="fa fa-table"></i> Job Applicants for (job title)
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Applicants Name </th>
                                <th>Address </th>
                                <th>Contact Number</th>
                                <th>Resume</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-light">
                                    <td>{{$getappliedapplicants->user->firstName}}</td>
                                    <td>{{$getappliedapplicants->user->address}}</td>
                                    <td>{{$getappliedapplicants->user->phone}}</td>
                                    <td><a href="#" class="btn btn-xs btn-outline-primary">View Resume</a></td>
                                    <td>
                                        <a href="#" class="btn btn-xs btn-outline-primary">Hire</a>
                                        <a href="#" class="btn btn-xs btn-outline-primary">Reject</a>                                   
                                    </td>
                                </tr>       
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
                    @endif
    </div>

@endsection
