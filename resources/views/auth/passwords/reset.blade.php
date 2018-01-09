@extends('layouts.app')

@section('content')

@if (session('status'))
    <div class="notification is-success">
        {{ session('status') }}
    </div>
@endif

{{-- Here we code our Bulma styled register form --}}

<div class="columns">
    <div class="column is-one-third is-offset-one-third m-t-100">
        <div class="card">
            <div class="card-content">
                {{-- Here inside card content are all our fields --}}
                <h1 class="title">Reset Your Password</h1>
                {{-- Now we add all our fields --}}

              {{-- Here we wrapp this in our form  --}}
                <form action="{{ route('password.request') }}" method="POST" role="form">
                   {{ csrf_field() }}

                   <input type="hidden" name="token" value="{{ $token }}">

                    {{-- Here we add email field --}}
                    <div class="field">
                        <label for="email" class="label">Email Address</label>
                        <p class="control">
                            <input class="input {{ $errors->has('email') ? 'is-danger' : '' }}" type="text" name="email" id="email"  value="{{ old('email') }}" required>
                        </p>
                        {{-- Here we make dynamic error message to show when we have email errors --}}
                        @if ($errors->has('email'))
                            <p class="help is-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    {{-- Here we add password field --}}
                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <label for="password" class="label">Password</label>
                            <p class="control">
                                <input class="input {{ $errors->has('password') ? 'is-danger' : '' }}" type="password" name="password" id="password" required>
                            </p>
                            {{-- Here we make dynamic error message to show when we have password errors --}}
                            @if ($errors->has('password'))
                                <p class="help is-danger">{{ $errors->first('password') }}</p>
                            @endif
                        </div>
                    </div>

                    {{-- Here we add password_confirmation field --}}
                    <div class="column">
                        <div class="field">
                            <label for="password_confirmation" class="label">Confirm Password</label>
                            <p class="control">
                                <input class="input {{ $errors->has('password_confirmation') ? 'is-danger' : '' }}" type="password" name="password_confirmation" id="password_confirmation" required>
                            </p>
                            {{-- Here we make dynamic error message to show when we have password errors --}}
                            @if ($errors->has('password_confirmation'))
                                <p class="help is-success">{{ $errors->first('password_confirmation') }}</p>
                            @endif
                        </div>
                    </div>
                </div>

                    {{-- Here we add our button field --}}
                    <button class="button is-primary is-outlined is-fullwidth m-t-30">Reset Password</button>
                </form>
            </div>
            {{-- end of card-content --}}
        </div>
            {{-- end of card --}}


    </div>
</div>
@endsection
