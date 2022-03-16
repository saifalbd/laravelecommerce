@extends('layouts.app')
@section('content')
<ul class="bardump">
    <li class="bardump-item">
        <a href="{{ route('admin.warehouse.index') }}" target="_blank"
            rel="noopener noreferrer">warehouses</a>
    </li>

</ul>
<div class="top-title-box">
    <h2>warehouses</h2>
    <div>
        <a class="btn" href="{{ route('admin.warehouse.create') }}">Create</a>
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
                    Title
                </th>
                <th>
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($warehouses as $warehouse)
                <tr>
                    <td>{{ $warehouse->id }}</td>
                    <td>{{ $warehouse->title }}</td>

                    <td>
                        <div>
                            <a class="btn small"
                                href="{{ route('admin.warehouse.edit',['warehouse'=>$warehouse->id]) }}">
                                Edit
                            </a>
                            <form
                                action="{{ route('admin.warehouse.destroy',['warehouse'=>$warehouse->id]) }}"
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
