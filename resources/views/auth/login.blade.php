@extends('layouts.app')

@section('title') ورود @endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ورود</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">آدرس ایمیل</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">گذرواژه</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        مرا به خاطر بسپار<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    ورود
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    رمز عبور خود را فراموش کرده اید؟
                                </a>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <a href="{{ route('socialite.login', 'github') }}" class="btn btn-github"><button type="button" class="btn btn-success"><i class="fab fa-github"></i> گیت هاب</button></a>
{{--                                <a href="{{ route('socialite.login', 'twitter') }}" class="btn btn-twitter"><button type="button" class="btn btn-primary"><i class="fab fa-twitter"></i> توئیتر</button></a>--}}
                                <a href="{{ route('socialite.login', 'google') }}" class="btn btn-google"><button type="button" class="btn btn-danger"><i class="fab fa-google"></i> گوگل</button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
