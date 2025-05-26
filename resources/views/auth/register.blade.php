@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 p-6 bg-white shadow rounded">
    <h2 class="text-2xl font-bold mb-4 text-center">Register</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-600 p-2 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register.submit') }}">
        @csrf

        <div class="mb-4">
            <label for="student_id" class="block font-semibold">Student ID</label>
            <input id="student_id" name="student_id" type="text" value="{{ old('student_id') }}" required class="w-full border rounded p-2">
        </div>

        <div class="mb-4">
            <label for="first_name" class="block font-semibold">First Name</label>
            <input id="first_name" name="first_name" type="text" value="{{ old('first_name') }}" required class="w-full border rounded p-2">
        </div>

        <div class="mb-4">
            <label for="last_name" class="block font-semibold">Last Name</label>
            <input id="last_name" name="last_name" type="text" value="{{ old('last_name') }}" required class="w-full border rounded p-2">
        </div>

        <div class="mb-4">
            <label for="email" class="block font-semibold">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required class="w-full border rounded p-2">
        </div>

        <div class="mb-4">
            <label for="password" class="block font-semibold">Password</label>
            <input id="password" name="password" type="password" required class="w-full border rounded p-2">
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block font-semibold">Confirm Password</label>
            <input id="password_confirmation" name="password_confirmation" type="password" required class="w-full border rounded p-2">
        </div>
