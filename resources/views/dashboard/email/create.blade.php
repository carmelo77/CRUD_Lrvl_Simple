@extends('layout.app')

@section('title', 'Crear email')

@section('content')

<div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 rounded-lg">
    <h1 class="text-5xl text-center font-bold">
        New email
    </h1>

    <form method="POST" action="{{ route('emails.store') }}" class="mt-5">
        @csrf

        <input 
            type="text" 
            class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2"
            placeholder="Subject"
            id="subject"
            name="subject"
        >

        @error('subject')
            <p class="border border-red-700 rounded-md bg-red-300 w-full text-red-900 p-2 my-2">
                {{ $message }}
            </p>
        @enderror

        <input 
            type="text" 
            class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2"
            placeholder="To"
            id="to"
            name="to"
        >

        @error('to')
            <p class="border border-red-700 rounded-md bg-red-300 w-full text-red-900 p-2 my-2">
                {{ $message }}
            </p>
        @enderror

        <input 
            type="text" 
            class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2"
            placeholder="Content"
            id="content"
            name="content"
        >

        @error('content')
            <p class="border border-red-700 rounded-md bg-red-300 w-full text-red-900 p-2 my-2">
                {{ $message }}
            </p>
        @enderror


        <button 
            type="submit"
            class="rounded-md bg-indigo-900 w-full py-3 px-4 text-white mt-4"
        >

            Send

        </button>
    </form>
</div>

@endsection