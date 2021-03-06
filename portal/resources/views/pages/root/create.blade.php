@extends('layouts.no_nav')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 give_bottom_room">
                @if(file_exists(base_path("/public/assets/images/logo.png")))
                    <img src="/assets/images/logo.png">
                @else
                    <img src="/assets/images/transparent_logo.png">
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{trans("headers.createYourAccount",[],$language)}}</h3>
                    </div>
                    <div class="panel-body">
                        <p>
                            {{trans("register.creationDescription",[],$language)}}
                        </p>
                        {!! Form::open(['action' => ['AuthenticationController@createAccount', 'token' => $creationToken->token], 'id' => 'createForm', 'method' => 'post']) !!}
                        <div class="form-group">
                            <label for="email">{{trans("register.email",[],$language)}}</label>
                            {!! Form::email("email",null,['id' => 'email', 'class' => 'form-control', 'placeholder' => trans("register.email",[],$language)]) !!}
                        </div>
                        <div class="form-group">
                            <label for="username">{{trans("register.username",[],$language)}}</label>
                            {!! Form::text("username",null,['id' => 'username', 'class' => 'form-control', 'placeholder' => trans("register.username",[],$language)]) !!}
                        </div>
                        <div class="form-group">
                            <label for="password">{{trans("register.password",[],$language)}}</label>
                            {!! Form::password("password",['id' => 'password', 'class' => 'form-control', 'placeholder' => trans("register.password",[],$language)]) !!}
                        </div>
                        <p id="strength" style="color: #a94442;"></p>
                        <div class="form-group">
                            <label for="password_confirmation">{{trans("register.confirmPassword",[],$language)}}</label>
                            {!! Form::password("password_confirmation",['id' => 'password_confirmation', 'class' => 'form-control', 'placeholder' => trans("register.confirmPassword",[],$language)]) !!}
                        </div>
                        <button type="submit" id="createButton" class="btn btn-primary">{{trans("actions.createAccount",[],$language)}}</button>
                        {!! Form::close() !!}
                    </div>
                </div>
                <p>
                    <a href="{{action("AuthenticationController@index")}}">{{trans("register.back",[],$language)}}</a>
                </p>
            </div>
        </div>
    </div>
@endsection
@section('additionalJS')
    <script>
        var passwordStrength = {{Config::get("customer_portal.password_strength_required")}};
    </script>
    <script type="text/javascript" src="/assets/js/zxcvbn.js"></script>
    <script type="text/javascript" src="/assets/js/pages/register/register.js"></script>
    {!! JsValidator::formRequest('App\Http\Requests\AccountCreationRequest','#createForm') !!}
@endsection
@section('additionalCSS')
    <link rel="stylesheet" href="/assets/css/pages/index.css">
@endsection