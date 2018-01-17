@extends('layouts.manage')

@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Manage Users</h1>
            </div>
            <div class="column">
                <a href="{{ route('users.create') }}" class="button is-primary is-pulled-right"> <i class="fa fa-user-add m-r-10"></i>Create New User</a>
            </div>
        </div>
        <hr>

        <div class="card">
            <div class="card-content">
                <table class="table is-narrow">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Date Created</td>
                            <td>Actions</td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <th>{{ $user->id }}</<th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->toFormattedDateString() }}</td>
                            <td><a href="{{ route('users.edit', $user->id) }}" class="button is-outlined">Edit</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div><!--End of the card -->
        {{ $users->links() }}
    </div>
@endsection
