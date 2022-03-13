@extends('layouts.app')
@section('content')
<ul class="bardump">
    <li class="bardump-item">
        <a href="{{ route('admin.user.index') }}" target="_blank" rel="noopener noreferrer">users</a>
    </li>

</ul>







<div class="container">

    <x-admin.form-layout title="Edit {{ $user->name }}" :is-put="true"
        :action="route('admin.user.update',['user'=>$user->id])">

        <div class="input-group is-half">
            <label>name</label>
            <input name="name" value="{{ old('name') ?? $user->name }}"
                class="input @error('name') is-invalid @enderror">
            @error('name')
                <small>
                    {{ $message }}
                </small>
            @enderror
        </div>

        <div class="input-group  is-half">
            <label>Email</label>
            <input name="email" value="{{ old('email')??$user->email }}"
                class="input @error('email') is-invalid @enderror">
            @error('email')
                <small>
                    {{ $message }}
                </small>
            @enderror
        </div>
        <div class="input-group  is-half">
            <label>User Rule</label>
            <select name="type" value="{{ old('type')??$user->has }}"
                class="input @error('type') is-invalid @enderror">
                @foreach($types as $t)
                    <option value="{{ $t }}">{{ $t }}</option>
                @endforeach
            </select>
            @error('rule')
                <small>
                    {{ $message }}
                </small>
            @enderror
        </div>
        <div class="input-group  is-half">
            <label>Password</label>
            <input name="password" value="{{ old('password') }}"
                class="input @error('email') is-invalid @enderror">
            @error('password')
                <small>
                    {{ $message }}
                </small>
            @enderror
        </div>





    </x-admin.form-layout>

</div>
@endsection
