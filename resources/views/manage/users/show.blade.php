@extends('layouts.manage')

@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">View User Details</h1>
            </div><!--end of column -->

            <div class="column">
                <a href="{{ route('users.edit', $user->id) }}" class="button is-primary is-pulled-right"> <i class="fa fa-user m-r-10"></i>Edit User</a>
            </div>
        </div>
        <hr class="m-t-0">

         {{-- Here we create form for store new user --}}
        <div class="columns">
            <div class="column">
                {{-- Name preformated filed --}}
                <div class="field">
                    <label for="name" class="label">Name</label>
                    <pre>{{ $user->name }}</pre>
                </div>

                {{-- Email preformated field --}}
                <div class="field">
                    <label for="email" class="label">Email</label>
                    <pre>{{ $user->email }}</pre>
                </div>

                {{-- Date perfomated field --}}
                <div class="field">
                    <label for="date" class="label">Date Created</label>
                    <pre>{{ $user->created_at->toFormattedDateString() }}</pre>
                </div>

            </div>
        </div>
    </div><!--End of the flex-container-->

@endsection
