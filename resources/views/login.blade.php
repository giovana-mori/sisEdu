@extends('layouts.main')
@section('title', 'Login')
@section('content')
    <main class="min-h-[80.9vh] flex justify-center items-center flex-col">
        <h1 class="text-4xl mb-6 text-gray-100">Login</h1>
        <form method="post" action="{{route('login.post')}}" class="w-full max-w-sm bg-gray-700 p-6 rounded-lg shadow-lg">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-100 text-sm font-bold mb-2">Email</label>
                <input type="email" id="email" name="email" class="border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Email">
                @if ($errors->has('email'))
                    <p class="text-red-500 text-xs mt-2">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-100 text-sm font-bold mb-2">Password</label>
                <input type="password" id="password" name="password" class="border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Password">
                @if ($errors->has('password'))
                    <p class="text-red-500 text-xs mt-2">{{ $errors->first('password') }}</p>
                @endif
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Login
                </button>
            </div>
        </form>
    </main>
@endsection
