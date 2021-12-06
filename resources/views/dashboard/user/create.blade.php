@extends('layout.app')

@section('title', 'Login de usuarios')

@section('content')

<div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 rounded-lg">
    <h1 class="text-5xl text-center font-bold">
        New user
    </h1>

    <form method="POST" action="{{ route('users.store') }}" class="mt-5">
        @csrf

        <input 
            type="name" 
            class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2"
            placeholder="Name"
            id="name"
            name="name"
        >

        @error('name')
            <p class="border border-red-700 rounded-md bg-red-300 w-full text-red-900 p-2 my-2">
                {{ $message }}
            </p>
        @enderror

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

        <input 
            type="password" 
            class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2"
            placeholder="Confirm Password"
            id="password_confirm"
            name="password_confirm"
        >

        @error('password_confirm')
            <p class="border border-red-700 rounded-md bg-red-300 w-full text-red-900 p-2 my-2">
                {{ $message }}
            </p>
        @enderror

        <input 
            type="text" 
            class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2"
            placeholder="Phone"
            id="phone"
            name="phone"
        >

        @error('phone')
            <p class="border border-red-700 rounded-md bg-red-300 w-full text-red-900 p-2 my-2">
                {{ $message }}
            </p>
        @enderror

        <input 
            type="text" 
            class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2"
            placeholder="Document personal"
            id="number_personal_document"
            name="number_personal_document"
        >

        @error('number_personal_document')
            <p class="border border-red-700 rounded-md bg-red-300 w-full text-red-900 p-2 my-2">
                {{ $message }}
            </p>
        @enderror

        <input 
            type="date" 
            class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2"
            placeholder="Birth date"
            id="date_birth"
            name="date_birth"
        >

        @error('date_birth')
            <p class="border border-red-700 rounded-md bg-red-300 w-full text-red-900 p-2 my-2">
                {{ $message }}
            </p>
        @enderror

        <input 
            type="text" 
            class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2"
            placeholder="City code"
            id="city_code"
            name="city_code"
        >

        @error('city_code')
            <p class="border border-red-700 rounded-md bg-red-300 w-full text-red-900 p-2 my-2">
                {{ $message }}
            </p>
        @enderror

				<select 
            class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2"
            placeholder="City code"
            id="role"
            name="role"
        >
						<option value="">Selecciona una opción</option>
						<option value="admin">Admin</option>
						<option value="user">Person</option>
				</select>

        @error('role')
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