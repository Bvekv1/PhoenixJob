@extends('layout.mainlayout')
@section('content') 

    <div class="form-section">
        <div class="container m-5">
        <div class="display-1 text-center text-light m-5">Job Applied</div>
        <div class="thumbnail card">   
        @if(isset($getjobapplied))
                        @foreach($getjobapplied as $getjobsapplied)
                    <div class="caption card-body">
                                <h3 class="group card-title inner list-group-item-heading">
                                    Job title</h3>
                                <div class="row">
                                    <div class="col-md-9">
                                        <p class="group inner list-group-item-text"> {{$getjobsapplied->jobTitle}}</p>
                                    </div>
                                    <div class="col-md-3">
                                    
                                        <a class="btn btn-success boxed-btn text-light" href="">View</a>
                                    </div>       
                                </div>
                                <div class="row">
                                <div class="col-md-9">
                                    <p class="group inner list-group-item-text">This is description</p>
                                </div>
                                <div class="col-md-3">
                                    <a class="btn btn-danger boxed-btn text-light" href="/deleteappliedJob/{{$getjobsapplied->jobId}}">Delete</a>
                                </div>
                                <p class=" d-block">Location</p>
                                <p class="group inner list-group-item-text d-block">Job hour</p> 
                            </div>
                
            </div>
            @endforeach
            @endif
        </div>
        </div>
    </div>

@endsection