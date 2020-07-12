@extends('layout.admin_layout')
@section('content')
    @if(isset($edit))
        @foreach($edit as $edits)
            @error('message')
            <script>
                alert('job successfully updated');
            </script>
            @enderror
            @error('error')
            <div class="alert-danger"> <p> {{$error->first('error')}}</p></div>
            @enderror
            <section class="form-section">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-6 col-md-6">
                        <form class="form-container" action="{{route('job_edit')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <h1 for="exampleInputEmail1" >Edit Job</h1>
                            </div>
                            <div class="form-group">
                                <input type="text" name="jobId" value="{{$edits->jobId}}" class="form-control" placeholder="Enter Job Title" readonly hidden>
                            </div>
                            <div class="form-group">
                                <input type="text" name="job_title" value="{{$edits->jobTitle}}" class="form-control" placeholder="Enter Job Title" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="experience" value="{{$edits->experience}}" class="form-control" placeholder="Enter Experiences" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="level" value="{{$edits->level}}" class="form-control" placeholder="Enter level" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="position" value="{{$edits->positions}}" class="form-control" id="exampleInputPassword1" placeholder="Position" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Select Job Type</label>
                                <select name="jobType" class="form-control mb-3" id="exampleFormControlSelect1">
                                    <option value="Part Time" {{ 'Part Time' == $edits->jobType ? 'selected' : ''}}>Part Time</option>
                                    <option value="Full Time" {{ 'Full Time' == $edits->jobType ? 'selected' : ''}}>Full Time</option>
                                    <option value="Hour Base" {{ 'Hour Base' == $edits->jobType ? 'selected' : ''}}>Hour Base</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" name="salary" value="{{$edits->salary}}" class="form-control" placeholder="Enter Salary" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="education" class="form-control" value="{{$edits->education}}" placeholder="Enter Education" required>
                            </div>
                            <div class="form-group">
                                <input type="text" value="{{$edits->Location}}" name="location" class="form-control" placeholder="Enter Location" required>
                            </div>
                            <div class="form-group">
                                <input type="text" value="{{$edits->applyBefore}}" name="applyBefore" class="form-control" placeholder="Apply before" required>
                            </div>
                            <div class="form-group">
                                <label>Enter job description</label>
                                <textarea name="jobDescription" type="text" class="form-control"
                                          style="width:400px; height:50px;" required>
{{$edits->jobDescription}}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label>Enter qualifications</label>
                                <textarea name="jobQualification" type="text" class="form-control"
                                          style="width:400px; height:50px;" required>
{{$edits->jobQualification}}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <input type="text" value="{{$edits->expected}}" name="expected" class="form-control" placeholder="Enter Expected" required>
                            </div>
                            <div class="form-group">
                                <input type="text" value="{{$edits->jobHours}}" name="jobHours" class="form-control" placeholder="Enter Job Hour" required>
                            </div>
                            <div class="form-group">
                                <label>Enter benefits</label>
                                <textarea name="benefits" type="text" class="form-control"
                                          style="width:400px; height:50px;" required>
{{$edits->benefits}}
                                </textarea>
                            </div>
                            <button type="submit" class="btn btn-success btn-block">Post Job</button>
                        </form>
                    </div>
                </div>
            </section>
        @endforeach
    @else
        @error('message')
        <script>
            alert('job successfully posted');
        </script>
        @enderror
        <section class="form-section">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-6 col-md-6">
                    <form class="form-container" action="{{ route('job_post') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <h1 for="exampleInputEmail1" >Post Job</h1>
                        </div>
                        <div class="form-group">
                            <input type="text" name="job_title" class="form-control" placeholder="Enter Job Title">
                        </div>
                        <div class="form-group">
                            <input type="text" name="experience" class="form-control" placeholder="Enter Experiences">
                        </div>
                        <div class="form-group">
                            <input type="text" name="level" class="form-control" placeholder="Enter level">
                        </div>
                        <div class="form-group">
                            <input type="text" name="position" class="form-control" id="exampleInputPassword1" placeholder="Position">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Job Type</label>
                            <select name="jobType" class="form-control mb-3" id="exampleFormControlSelect1">
                                <option value="Part Time">Part Time</option>
                                <option value="Full Time">Full Time</option>
                                <option value="Hour Base">Hour Base</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="salary" class="form-control" placeholder="Enter Salary">
                        </div>
                        <div class="form-group">
                            <input type="text" name="education" class="form-control" placeholder="Enter Education">
                        </div>
                        <div class="form-group">
                            <input type="text" name="location" class="form-control" placeholder="Enter Location">
                        </div>
                        <div class="form-group">
                            <input type="text" name="applyBefore" class="form-control" placeholder="Apply before">
                        </div>
                        <div class="form-group">
                            <label>Enter job description</label>
                            <textarea name="jobDescription" type="text" class="form-control"
                                      style="width:400px; height:50px;" required>
                    </textarea>
                        </div>
                        <div class="form-group">
                            <label>Enter qualifications</label>
                            <textarea name="jobQualification" type="text" class="form-control"
                                      style="width:400px; height:50px;" required>
                    </textarea>
                        </div>
                <div class="form-group">
                    <input type="text" name="expected" class="form-control" placeholder="Enter Expected">
                </div>
                <div class="form-group row">
                    <div class="col-md-10">
                        <input type="number" name="jobHours" class="form-control" placeholder="Enter Job Hour" min="1">
                    </div>
                    <div class="col-md-2">
                        <p>Hours</p>
                    </div>
                </div>
                <div class="form-group">
                    <label>Enter benefits</label>
                    <textarea name="benefits" type="text" class="form-control"
                        style="width:400px; height:50px;" required>

                    </textarea>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Post Job</button>
                    </form>
                </div>
            </div>
        </section>
    @endif
@endsection
