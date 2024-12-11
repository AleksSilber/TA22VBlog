@extends('partials.layout')
@section('title', 'Users')
@section('content')
    <div class="container mx-auto">
        <a class="btn btn-primary mb-4" href="{{ route('users.create') }}">Add User</a>
        <div class="text-center my-2">
            {{ $users->links() }}
        </div>
        <table class="table table-zebra w-full">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="hover">
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('Y-m-d H:i') }}</td>
                        <td>{{ $user->updated_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <div class="join">
                                <a href="{{route('users.show', ['user' => $user])}}" class="btn join-item btn-info">View</a>
                                <a href="{{route('users.edit', ['user' => $user])}}" class="btn join-item btn-warning">Edit</a>
                                <button form="user-delete-{{$user->id}}" class="btn join-item btn-error">Delete</button>
                            </div>
                                <form id="user-delete-{{$user->id}}" action="{{route('users.destroy', ['user' => $user])}}" method="POST" >
                                    @csrf
                                    @method('DELETE')
                                </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection