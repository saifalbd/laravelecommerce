@extends('layouts.app')
@section('content')
<ul class="bardump">
    <li class="bardump-item">
        <a href="{{ route('admin.product.index') }}" target="_blank"
            rel="noopener noreferrer">Product</a>
    </li>

</ul>







<div class="container">

    <x-admin.form-layout title="Product Create" :action="route('admin.product.store')">

        <div class="purchase-row top">
            <div class="input-group">
                <label>Vendor</label>
                <select name="vendor_id" value="{{ old('vendor_id') }}"
                    class="input @error('vendor_id') is-invalid @enderror">
                    <option value="">Select Vendor</option>
                    @foreach($vendors as $t)
                        <option value="{{ $t->id }}">{{ $t->title }}</option>
                    @endforeach
                </select>
                @error('vendor_id')
                    <small>
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="input-group">
                <label>date</label>
                <input name="date" type="date" value="{{ old('date') }}"
                    class="input @error('date') is-invalid @enderror">
                @error('date')
                    <small>
                        {{ $message }}
                    </small>
                @enderror
            </div>
        </div>

        <div class="purchase-row">
            <div class="input-group">
                <label>Products</label>
                <select name="category_id" value="{{ old('category_id') }}"
                    class="input @error('product_id') is-invalid @enderror">
                    <option value="">Select Products</option>
                    @foreach($products as $t)
                        <option value="{{ $t->id }}">{{ $t->title }}</option>
                    @endforeach
                </select>
                @error('rule')
                    <small>
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <div class="input-group">
                <label>quantity</label>
                <input name="quantity" type="number" value="{{ old('quantity') }}"
                    class="input @error('quantity') is-invalid @enderror">
                @error('quantity')
                    <small>
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <div class="input-group">
                <label>rate</label>
                <input name="rate" value="{{ old('rate') }}"
                    class="input @error('rate') is-invalid @enderror">
                @error('rate')
                    <small>
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <div class="input-group">
                <label>vat</label>
                <input name="rate" value="{{ old('vat') }}"
                    class="input @error('vat') is-invalid @enderror">
                @error('vat')
                    <small>
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="add-remove">
                <button type="button">
                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z" />
                    </svg>
                </button>
                <button type="button">
                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" />
                    </svg>
                </button>
            </div>





        </div>

















    </x-admin.form-layout>

</div>
@endsection
