@extends('layouts.app')
@section('content')
<ul class="bardump">
    <li class="bardump-item">
        <a href="{{ route('admin.category.index') }}" target="_self"
            rel="noopener noreferrer">categorys</a>
    </li>

</ul>
<div class="top-title-box">
    <h2>categorys</h2>
    <div>
        <a class="btn" href="{{ route('admin.category.create') }}">Create</a>
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
                    Parent
                </th>
                <th>
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>

                    <td>{{ $category->parent? $category->parent->title:'' }}</td>
                    <td>
                        <div>
                            <a class="btn small"
                                href="{{ route('admin.category.edit',['category'=>$category->id]) }}">
                                Edit
                            </a>
                            <form
                                action="{{ route('admin.category.destroy',['category'=>$category->id]) }}"
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
