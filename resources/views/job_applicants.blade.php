@extends('layout.admin_layout')
@section('content')
@error('message')
            <script>
                alert('applicant was hired');
            </script>
@enderror
    <div class="col p-4">

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
                                <th style="display:none;">userId</th>
                                <th>Resume</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($getjobapplicant))
                        @foreach($getjobapplicant as $getappliedapplicants)
                                <tr class="bg-light">
                                    <td>{{$getappliedapplicants->user->firstName}}</td>
                                    <td>{{$getappliedapplicants->user->address}}</td>
                                    <td>{{$getappliedapplicants->user->phone}}</td>
                                    <td style="display:none;">{{$getappliedapplicants->user->id}}</td>
                                    <td><a href="{{asset('upload')}}/{{$getappliedapplicants->resume}}" target="_blank" class="btn btn-xs btn-outline-primary">View Resume</a></td>
                                    <td>
                                        <a href="/job_applicants/{{$getappliedapplicants->jobJobId}}/{{$getappliedapplicants->user->id}}" class="btn btn-xs btn-outline-primary">Hire</a>
                                        <a href="/job_applicants_rejected/{{$getappliedapplicants->jobJobId}}/{{$getappliedapplicants->user->id}}" class="btn btn-xs btn-outline-primary">Reject</a>
                                    </td>
                                </tr>
                                @endforeach
                    @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
