@extends('layout.admin_layout')
@section('content')
    @error('message')
    <script>
        alert('Job was successfully deleted');
    </script>
    @enderror
    <div class="col p-4">
        <div class="container">
            <div class="card mb-3">
                <div class="card-header text-right">
                    <div class="text-left">
                        <i class="fa fa-table"></i> Job List
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Job Title</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($jobList))
                                @foreach($jobList as $jobsList)
                                    <tr class="bg-light">
                                        <td>{{$jobsList->jobTitle}}</td>
                                        <td>
                                            <a href="/job_applicants/{{$jobsList->jobId}}" class="btn btn-xs btn-outline-primary">View Applicants</a>
                                            <a href="/job_edit/{{$jobsList->jobId}}" class="btn btn-xs bt-default"><span class="fa fa-pencil"></span></a>
                                            <a href="/deleteJob/{{$jobsList->jobId}}" class="btn btn-xs btn-default"><span class="fa fa-trash"></span></a>
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
