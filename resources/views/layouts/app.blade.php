<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>ABC Shop</title>

        <!-- Livewire -->
        <livewire:styles />

        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.5/dist/flowbite.min.css" />

        <!-- font-awesome icons -->
        <script src="https://kit.fontawesome.com/2d49de291b.js" crossorigin="anonymous"></script>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100"> 
            <div class="flex bg-white">
                <div class="md:flex w-2/5 md:w-1/5 h-screen sticky text-white top-0 bg-indigo-500 border-r hidden">
                    <div class="mx-auto py-5">
                        <ul>
                            <a href="{{ route('home') }}"><li class="{{ (request()->segment(1) == 'home') ? 'bg-indigo-700 border-indigo-700': '' }} px-3 py-1 flex space-x-2 mt-10 rounded-md border-indigo-500 cursor-pointer hover:bg-indigo-600 hover:border-indigo-700">					
                                <span class="font-semibold"><i class="fa-solid fa-house"></i> Home</span>
                            </li></a>
                            @if (auth()->user()->type == 'Admin')
                            <a href="{{ route('users.index') }}"><li class="{{ (request()->segment(1) == 'users') ? 'bg-indigo-700 border-indigo-700': '' }} px-3 py-1 flex space-x-2 mt-10 rounded-md border-indigo-500 cursor-pointer hover:bg-indigo-600 hover:border-indigo-700">					
                                <span class="font-semibold"><i class="fa-solid fa-users"></i> Users</span>
                            </li></a>
                            @endif
                            <a href="{{ route('categories.index') }}"><li class="{{ (request()->segment(1) == 'categories') ? 'bg-indigo-700 border-indigo-700': '' }} px-3 py-1 flex space-x-2 mt-10 rounded-md border-indigo-500 cursor-pointer hover:bg-indigo-600 hover:border-indigo-700">					
                                <span class="font-semibold"><i class="fa-solid fa-bars-staggered"></i> Categories</span>
                            </li></a>
                            <a href=""><li class="{{ (request()->segment(1) == 'products') ? 'bg-indigo-700 border-indigo-700': '' }} px-3 py-1 flex space-x-2 mt-10 rounded-md border-indigo-500 cursor-pointer hover:bg-indigo-600 hover:border-indigo-700">					
                                <span class="font-semibold"><i class="fa-solid fa-box-open"></i> Products</span>
                            </li></a>
                            <a href="{{ route('logout') }}"><li class="{{ (request()->segment(1) == 'logout') ? 'bg-indigo-700 border-indigo-700': '' }} px-3 py-1 flex space-x-2 mt-10 rounded-md border-indigo-500 cursor-pointer hover:bg-indigo-600 hover:border-indigo-700">					
                                <span class="font-semibold"><i class="fa-solid fa-power-off"></i> Sign Out</span>
                            </li></a>                        
                        </ul>
                    </div>
                </div>
                <main class="min-h-screen w-full bg-white border-l" style="overflow: hidden;"> 
                    @include('layouts.header')  
                    @yield('bodycontent')		
                </main>
            </diV>    
        </div>
        <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
        <livewire:scripts />
        @stack('js')
    </body>
</html>