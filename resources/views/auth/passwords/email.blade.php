@extends('layouts.login')
<!-- Main Content -->
@section('content')
<div class="loginbox">
        <h1 class="logo"><img src="/frontend/images/logo.png" class="img-responsive" alt="CT Plumbing" title="CT Plumbing" ></h1>
        <h3><i></i><span>Reset Password</span></h3>
       @if (session('status'))
            <div class="alert alert-success">
            {{ session('status') }}
            </div>
        @endif
         <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        </div>    
                           <div class="form-group">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email"required>
                            </div>    
                            <div class="form-group">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        <div class="form-group btn-row has-feedback">
                            <button type="submit" class="btn btn-primary block full-width m-b">Reset Password</button>
                        </div>
        </form>
    </div>
@endsection
