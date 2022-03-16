@extends('layouts.app')
@section('content')
<ul class="bardump">
    <li class="bardump-item">
        <a href="{{ route('admin.unit.index') }}" target="_blank" rel="noopener noreferrer">units</a>
    </li>

</ul>
<div class="top-title-box">
    <h2>units</h2>
    <div>
        <a class="btn" href="{{ route('admin.unit.create') }}">Create</a>
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
                    SortTitle
                </th>
                <th>
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($units as $unit)
                <tr>
                    <td>{{ $unit->id }}</td>
                    <td>{{ $unit->title }}</td>
                    <td>{{ $unit->sort_title }}</td>
                    <td>
                        <div>
                            <a class="btn small"
                                href="{{ route('admin.unit.edit',['unit'=>$unit->id]) }}">
                                Edit
                            </a>
                            <form
                                action="{{ route('admin.unit.destroy',['unit'=>$unit->id]) }}"
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
