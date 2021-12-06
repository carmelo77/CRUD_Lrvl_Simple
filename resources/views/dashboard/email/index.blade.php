@extends('layout.app')

@section('title', 'Home')

@section('content')

<h1 class="text-4xl text-center mt-10">Emails massives</h1>

<button 
    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-5"
    onclick="location.href='{{ url('/emails/create') }}'"
>
    Create
</button>

<div class="flex flex-col mt-5 pl-5 pr-5">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Subject
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                To
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Content
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Status
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @foreach($email as $value)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="text-sm text-gray-500">
                        {{ $value->subject }}
                    </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ $value->to }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                {{ $value->content }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                @if($value->status == 'send')
                  <div class="border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Enviado</strong>
                  </div>
                @else
                  <div class="border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">No enviado</strong>
                  </div>
                @endif
                
              </td>
            </tr>
            @endforeach
          </tbody>
          {{ $email->links() }}
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