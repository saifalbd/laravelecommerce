@extends('layouts.app')
@section('content')
<ul class="bardump">
    <li class="bardump-item">
        <a href="{{ route('admin.unit.index') }}" target="_blank" rel="noopener noreferrer">unit</a>
    </li>

</ul>







<div class="container">

    <x-admin.form-layout title="unit Edit" :is-put="true" :action="route('admin.unit.update',['unit'=>$unit->id])">


        <div class="input-group is-half">
            <label>Title</label>
            <input name="title" value="{{ old('title')??$unit->title }}"
                class="input @error('title') is-invalid @enderror">
            @error('title')
                <small>
                    {{ $message }}
                </small>
            @enderror
        </div>


        <div class="input-group is-half">
            <label>Sort Title</label>
            <input name="sort_title" value="{{ old('sort_title')??$unit->sort_title }}"
                class="input @error('sort_title') is-invalid @enderror">
            @error('sort_title')
                <small>
                    {{ $message }}
                </small>
            @enderror
        </div>





    </x-admin.form-layout>

</div>
@endsection
