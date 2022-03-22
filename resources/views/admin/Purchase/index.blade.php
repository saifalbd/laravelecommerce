@extends('layouts.app')
@section('content')
<ul class="bardump">
    <li class="bardump-item">
        <a href="{{ route('admin.purchase.index') }}" target="_blank"
            rel="noopener noreferrer">purchases</a>
    </li>

</ul>
<div class="top-title-box">
    <h2>purchases</h2>
    <div>
        <a class="btn" href="{{ route('admin.purchase.create') }}">Create</a>
    </div>
</div>
<div class="container">

    <table class="list-items">
        <thead>
            <tr>
                <th>
                    ID
                </th>
                <!-- <th>
                    Title
                </th> -->
                <!-- <th>
                    price
                </th>
                <th>
                    unit
                </th>
                <th>
                    category
                </th>
                <th>
                    Stock
                </th>
                <th>
                    Actions
                </th> -->
            </tr>
        </thead>
        <tbody>
            @foreach($purchases as $purchase)
                <tr>
                    <td>{{ $purchase->id }}</td>

                    <td>
                        <div>
                            <a class="btn small"
                                href="{{ route('admin.purchase.edit',['purchase'=>$purchase->id]) }}">
                                Edit
                            </a>
                            <form
                                action="{{ route('admin.purchase.destroy',['purchase'=>$purchase->id]) }}"
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
