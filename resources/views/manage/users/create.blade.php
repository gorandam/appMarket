@extends('layouts.manage')

@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Create New User</h1>
            </div>
        </div>
        <hr class="m-t-0">

        {{-- Here we create form for store new user --}}
        <div class="columns">
            <div class="column">
                <form method="POST" action="{{ route('users.store') }}">
                    {{ csrf_field() }}
                    {{-- Name input filed --}}
                    <div class="field">
                        <label for="name" class="label">Name</label>
                        <p class="controll">
                            <input type="text" class="input" name="name" id="name">
                        </p>
                    </div>

                    {{-- Email input field --}}
                    <div class="field">
                        <label for="email" class="label">Email</label>
                        <p class="controll">
                            <input type="text" class="input" name="email" id="email">
                        </p>
                    </div>

                    {{-- Password input filed --}}
                    <div class="field">
                        <label for="password" class="label">Password</label>
                        <p class="controll">
                            <input type="password" class="input" name="password" id="password" v-if="!auto_password" placeholder="Manually give a password to this user">
                            <b-checkbox name="auto_generate" class="m-t-15" v-model="auto_password">Auto Generate Password</b-checkbox>
                        </p>
                    </div>

                    {{-- Button field --}}
                    <button class="button is-success">Create User</button>
                </form>
            </div>
        </div>
    </div> <!-- End of te flex-container -->
@endsection

{{-- Here we write Vue.js code and bind auto_password and set it by defalut to be checked --}}
@section('scripts')
    <script>
        var app = new Vue({
             el: '#app',
             data: {
                auto_password: true
             }
        });
    </script>
@endsection


