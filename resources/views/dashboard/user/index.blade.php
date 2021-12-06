@extends('layout.app')

@section('title', 'Home')

@section('content')

<h1 class="text-4xl text-center mt-10">Users</h1>

<button 
    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-5"
    onclick="location.href='{{ url('/users/create') }}'"
>
    Create
</button>

<form class="text-center" method="POST" action="{{ route('users.search') }}" class="mt-5">
  @csrf

  <input 
      type="name" 
      class="border border-gray-200 rounded-md bg-gray-200 w-1/3 text-lg placeholder-gray-900 p-2 my-2"
      placeholder="Name"
      id="search"
      name="search"
  >

  <Select 
      class="border border-gray-200 rounded-md bg-gray-200 w-1/3 text-lg placeholder-gray-900 p-2 my-2"
      placeholder="Option"
      id="option"
      name="option"
  >
    <option value="0">Selecciona una opción</option>
    <option value="1">Nombre</option>
    <option value="2">Email</option>
    <option value="3">CI</option>
    <option value="4">Telefono</option>
  </Select>

  <button 
      type="submit"
      class="rounded-md bg-indigo-900 w-1/1 py-3 px-4 text-white mt-4"
  >

      Search

  </button>
</form>

<!-- This example requires Tailwind CSS v2.0+ -->
<div class="flex flex-col mt-5 pl-5 pr-5">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Name
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Email
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                phone
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Number personal document
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Date birth
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                City code
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Role
              </th>
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Edit</span>
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @foreach($user as $value)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="text-sm text-gray-500">
                        {{ $value->name }}
                    </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ $value->email }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                {{ $value->phone }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                {{ $value->number_personal_document }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                {{ $value->age() }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                {{ $value->city_code }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                {{ $value->role }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="{{ route('users.edit', ['id' => $value->id]) }}" class="text-indigo-600">Edit</a>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <form method="post" action="{{route('users.destroy',[ 'id' => $value->id]) }}">
                    @method('delete')
                    @csrf
                    <button 
                        type="submit" 
                        class="text-red-600"
                    >
                        Delete
                    </button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
          {{ $user->links() }}
        </table>
      </div>
    </div>
  </div>
  @if(Session::has('success'))
    <p class="border border-green-700 rounded-md bg-green-300 w-full text-green-900 p-2 my-2">
        {{ Session::get('success') }}
    </p>
  @endif
</div>

@endsection