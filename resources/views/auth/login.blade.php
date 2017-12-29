@extends('layouts.app')

@section('content')

{{-- Here we code our Bulma styled login form --}}
<div class="columns">
    <div class="column is-one-third is-offset-one-third m-t-100">
        <div class="card">
            <div class="card-content">
                <h1 class="title">Log In</h1>

                <form action="{{ route('login') }}" method="POST" role="form">
                            {{ csrf_field() }}
                {{-- Here we add email field --}}
                    <div class="field">
                        <label for="email" class="label">Email Adress</label>
                        <p class="control">
                            <input class="input {{ $errors->has('email') ? 'is-danger' : '' }}" type="text" name="email" id="email" placeholder="name@example.com" value="{{ old('email') }}">
                        </p>
                        {{-- Here we write code to display error meseage --}}
                        @if ($errors->has('email'))
                            <p class="help is-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    {{-- Here we add password field --}}
                    <div class="field">
                        <label for="password" class="label">Password</label>
                        <p class="control">
                            <input class="input {{ $errors->has('password') ? 'is-danger' : '' }}" type="password" name="password" id="password">
                        </p>
                        {{-- Here we write code to display error meseage --}}
                        @if ($errors->has('password'))
                            <p class="help is-danger">{{ $errors->first('password') }}</p>
                        @endif
                    </div>

                    {{-- Here we write remember me chackbox and use buefy for that --}}
                    <b-checkbox name="remember" class="m-t-20">Remember Me</b-checkbox>

                    {{-- Here we add our button field --}}
                    <button class="button is-primary is-outlined is-fullwidth m-t-30">Log In</button>
                </form>
            </div>
            {{-- End of .card-content --}}
        </div>
        {{-- End of the card --}}

        {{-- Here outside card we make our request password link --}}
                    <h5 class="has-text-centered m-t-20"><a href="{{ route('password.request') }}" class="is-muted">Forgot Your Password?</a></h5>
    </div>
</div>

@endsection
