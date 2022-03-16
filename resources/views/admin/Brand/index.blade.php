@extends('layouts.app')
@section('content')
<ul class="bardump">
    <li class="bardump-item">
        <a href="{{ route('admin.brand.index') }}" target="_blank"
            rel="noopener noreferrer">brands</a>
    </li>

</ul>
<div class="top-title-box">
    <h2>Brand</h2>
    <div>
        <a class="btn" href="{{ route('admin.brand.create') }}">Create</a>
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
            @foreach($brands as $brand)
                <tr>
                    <td>{{ $brand->id }}</td>
                    <td>{{ $brand->title }}</td>
                    <td>
                        <div>
                            <a class="btn small"
                                href="{{ route('admin.brand.edit',['brand'=>$brand->id]) }}">
                                Edit
                            </a>
                            <form
                                action="{{ route('admin.brand.destroy',['brand'=>$brand->id]) }}"
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
