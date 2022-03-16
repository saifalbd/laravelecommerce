@extends('layouts.app')
@section('content')
<ul class="bardump">
    <li class="bardump-item">
        <a href="{{ route('admin.category.index') }}" target="_blank"
            rel="noopener noreferrer">Category</a>
    </li>

</ul>







<div class="container">

    <x-admin.form-layout title="Category Edit" :is-put="true"
        :action="route('admin.category.update',['category'=>$category->id])">


        <div class="input-group is-half">
            <label>Title</label>
            <input name="title" value="{{ old('title')??$category->title }}"
                class="input @error('title') is-invalid @enderror">
            @error('title')
                <small>
                    {{ $message }}
                </small>
            @enderror
        </div>


        <div class="input-group  is-half">
            <label>Parent</label>
            <select name="parent_id" value="{{ old('parent_id')??$category->parent_id }}"
                class="input @error('parent_id') is-invalid @enderror">
                <option value="">Select Parent</option>
                @foreach($parents as $t)
                    <option value="{{ $t->id }}">{{ $t->title }}</option>
                @endforeach
            </select>
            @error('parent_id')
                <small>
                    {{ $message }}
                </small>
            @enderror
        </div>





    </x-admin.form-layout>

</div>
@endsection
