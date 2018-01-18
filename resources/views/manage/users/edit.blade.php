@extends('layouts.manage')

@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Edit User</h1>
            </div>
        </div>
        <hr class="m-t-0">

        {{-- Here we create form for store new user --}}
        <div class="columns">
            <div class="column">
                <form method="POST" action="{{ route('users.update', $user->id) }}">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    {{-- Name input filed --}}
                    <div class="field">
                        <label for="name" class="label">Name</label>
                        <p class="controll">
                            <input type="text" class="input" name="name" id="name" value="{{ $user->name }}">
                        </p>
                    </div>

                    {{-- Email input field --}}
                    <div class="field">
                        <label for="email" class="label">Email</label>
                        <p class="controll">
                            <input type="text" class="input" name="email" id="email" value="{{ $user->email }}">
                        </p>
                    </div>

                    {{-- Password input filed --}}
                    <div class="field">
                        <label for="password" class="label">Password</label>
                        <b-radio-group v-model="password_options">
                            <div class="field">
                                <b-radio name="password_options" value="keep">Do Not Change Password</b-radio>
                            </div>
                            <div class="field">
                                <b-radio name="password_options" value="auto">Auto-Generate New Password</b-radio>
                            </div>
                            <div class="field">
                                <b-radio name="password_options" value="manual">Manually Set New Password</b-radio>
                                <p class="controll">
                                 <input type="password" class="input m-t-10" name="password" id="password" v-if="password_options == 'manual'" placeholder="Manually give a password to this user">
                                </p>
                            </div>
                        </b-radio-group>
                    </div>

                    {{-- Button field --}}
                    <button class="button is-primary">Edit User</button>
                </form>
            </div>
        </div>
    </div> <!-- End of the flex-container -->
@endsection

{{-- Here we write Vue.js code and bind password_options and set it by defalut to be keep --}}
@section('scripts')
    <script>
        var app = new Vue({
             el: '#app',
             data: {
                password_options: 'keep'
             }
        });
    </script>
@endsection


