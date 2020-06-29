@extends('layout.mainlayout')
@section('content')
<section class="form-section">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-6 col-md-6">
            <form class="form-container" action="{{route('login')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                <h1 for="exampleInputEmail1" >Login</h1>

                </div>
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" value="{{ old('email') }}" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <button type="submit" class="btn btn-primary bg-light">
                    <a href="/register">Signup</a>
                    </button>
            </form>
        </div>
    </div>
</section>

@endsection
<b></b>
