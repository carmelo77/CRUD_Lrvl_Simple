<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Laravel app</title>

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">

    <nav class="flex py-7 bg-indigo-400 text-white">
        <div class="w-1/2 px-8 mr-auto">
            <p class="text-2xl font-bold">
                My app
            </p>
        </div>

        <ul class="w-1/2 px-16 ml-auto flex justify-end pt-1">
            @if(!auth()->check())
                <li>
                    <a class="font-semibold hover:bg-indigo-700 py-4 px-3 rounded-md" href="{{ route('login.index') }}">
                        Signin
                    </a>
                </li>
            @else
                <li>
                    <a class="font-semibold hover:bg-indigo-700 py-4 px-3 rounded-md" href="{{ route('home') }}">
                        Home
                    </a>
                </li>

                <li>
                    <a class="font-semibold hover:bg-indigo-700 py-4 px-3 rounded-md" href="{{ route('users.index') }}">
                        Users
                    </a>
                </li>

                <li>
                    <a class="font-semibold hover:bg-indigo-700 py-4 px-3 rounded-md" href="{{ route('login.logout') }}">
                        Logout
                    </a>
                </li>
                <li class="mx-8">
                    <p class="text-xl"> Welcome <b>{{ auth()->user()->name }}</b> </p>
                </li>
            @endif
        </ul>
    </nav>

    @yield('content')
    
</body>
</html>