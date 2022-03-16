@extends('layouts.app')
@section('content')
<ul class="bardump">
    <li class="bardump-item">
        <a href="{{ route('admin.product.index') }}" target="_blank"
            rel="noopener noreferrer">Products</a>
    </li>

</ul>
<div class="top-title-box">
    <h2>Products</h2>
    <div>
        <a class="btn" href="{{ route('admin.product.create') }}">Create</a>
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
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->title }}</td>

                    <td>{{ $product->rate }}</td>
                    <td>{{ $product->unit->title }}</td>
                    <td>{{ $product->category->title }}</td>
                    <td>
                        {{ $product->stockQunatity }}
                    </td>
                    <td>
                        <div>
                            <a class="btn small"
                                href="{{ route('admin.product.edit',['product'=>$product->id]) }}">
                                Edit
                            </a>
                            <form
                                action="{{ route('admin.product.destroy',['product'=>$product->id]) }}"
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
