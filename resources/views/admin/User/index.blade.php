@extends('layouts.app')
@section('content')
<ul class="bardump">
    <li class="bardump-item">
        <a href="{{ route('admin.user.index') }}" target="_blank" rel="noopener noreferrer">users</a>
    </li>

</ul>
<div class="top-title-box">
    <h2>Users</h2>
    <div>
        <a class="btn" href="{{ route('admin.user.create') }}">Create</a>
    </div>
</div>
<div class="container">

    <table class="list-items">
        <thead>
            <tr>
                <th>
                    ID
                </th>
                <th>
                    Name
                </th>
                <th>
                    Email
                </th>
                <th>
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>

                    <td>{{ $user->email }}</td>
                    <td>
                        <div>
                            <a class="btn small"
                                href="{{ route('admin.user.edit',['user'=>$user->id]) }}">
                                Edit
                            </a>
                            <form
                                action="{{ route('admin.user.destroy',['user'=>$user->id]) }}"
                                method="post">
                                @csrf
                                @method('delete')
                                <button class="small" type="submit">Delete</button>
                            </form>
                        </div>

                    </td>

                </tr>
            @endforeach

        </tbody>
    </table>

</div>
@endsection
