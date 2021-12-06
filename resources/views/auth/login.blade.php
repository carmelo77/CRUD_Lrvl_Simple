@extends('layout.app')

@section('title', 'Login de usuarios')

@section('content')

<div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 rounded-lg">
    <h1 class="text-5xl text-center font-bold">
        Login
    </h1>

    <form method="POST" action="{{ route('login.signin') }}" class="mt-5">
        @csrf
        <input 
            type="email" 
            class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2"
            placeholder="Email"
            id="email"
            name="email"
        >

        @error('email')
            <p class="border border-red-700 rounded-md bg-red-300 w-full text-red-900 p-2 my-2">
                {{ $message }}
            </p>
        @enderror

        <input 
            type="password" 
            class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2"
            placeholder="Password"
            id="password"
            name="password"
        >

        @error('password')
            <p class="border border-red-700 rounded-md bg-red-300 w-full text-red-900 p-2 my-2">
                {{ $message }}
            </p>
        @enderror
    
        @error('message')
            <p class="border border-red-700 rounded-md bg-red-300 w-full text-red-900 p-2 my-2">
                {{ $message }}
            </p>
        @enderror

        <button 
            type="submit"
            class="rounded-md bg-indigo-900 w-full py-3 px-4 text-white mt-4"
        >

            Ingresar

        </button>
    </form>
</div>

@endsection