@extends('layouts.app')
@section('content')
<ul class="bardump">
    <li class="bardump-item">
        <a href="{{ route('admin.warehouse.index') }}" target="_blank"
            rel="noopener noreferrer">warehouse</a>
    </li>

</ul>







<div class="container">

    <x-admin.form-layout title="warehouse Create" :action="route('admin.warehouse.store')">

        <div class="input-group is-half">
            <label>Title</label>
            <input name="title" value="{{ old('title') }}"
                class="input @error('title') is-invalid @enderror">
            @error('title')
                <small>
                    {{ $message }}
                </small>
            @enderror
        </div>







    </x-admin.form-layout>

</div>
@endsection
