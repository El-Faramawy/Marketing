@extends('layouts.web.app')
@section('site_content')
  <div class="sin">
    <div class="sin container- ">
      <h1>{{__('login')}}</h1>
      <form class="mt-5" action="{{route('user_login')}}" method="post" id="form">
          @csrf
        <!-- Email input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">{{__('E-mail')}}</label>
          <input type="email" id="form2Example1" name="email" class="form-control" />
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example2">{{__('Password')}}</label>
          <input type="password" id="form2Example2" name="password" class="form-control" />
        </div>

        <!-- 2 column grid layout for inline styling -->
{{--        <div class="row mb-4">--}}


        <!-- Submit button -->
        <button type="submit" class="btn btn-block mb-4">{{__('login')}}</button>

        <!-- Register buttons -->
        <div class="text-center">
          <p>{{__('Not a member?')}} <a href="{{url('sign_up')}}" class="reg-and-s-in">{{__('Register')}}</a></p>
          <p>{{__('or sign up with:')}}</p>
          <div class="s-in-btns">
            <button type="button" href="{{route('login.facebook')}}" class="btn-primary">
              <i class="fab fa-facebook-f"></i> Facebook
            </button>
            <button type="button" href="{{route('login.google')}}" class="btn-danger">
              <i class="fab fa-google"></i> google
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
