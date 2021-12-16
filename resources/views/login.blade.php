@extends('layout')

@section('content')
<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full">
    <div class="mb-4">
        <a href="{{ route('products') }}" >< Back</a>
    </div>
    <h3 class="lg:text-4xl text-center mt-2 lg:mt-4 lg:mb-6">Email: test@test.test</h3>
    <h3 class="lg:text-4xl text-center mt-2 lg:mt-4 lg:mb-6">Password: test</h3>

    @if (session()->has('status'))
        <div class="bg-red-500 p-4 rounded-lg mx-4 mb-6 text-white text-center text-sm sm:text-base md:text-lg lg:text-xl xl:text-xl ">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="lg:mt-4 w-full px-6 text-2xl ">
            <div class="text-sm lg:text-lg">
                <input type="text" name="email" id="email" placeholder="Email"
                       class="w-full px-4 py-2 lg:mt-2 border focus:outline-none focus:ring-1 focus:ring-gray-600 @error('login') border-red-500 @enderror" >
                @error('email')
                <div class="text-red-500 mt-2 text-sm ">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mt-2 lg:mt-4 text-sm lg:text-lg">
                <input type="password" name="password" id="password" placeholder="Password"
                       class="w-full px-4 py-2  border  focus:outline-none focus:ring-1 focus:ring-gray-600 @error('password') border-red-500 @enderror" value="">
                @error('password')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="text-center lg:py-4 text-sm lg:text-lg">
                <button class="px-8 py-2 mt-4 text-white bg-green-700 rounded-3xl hover:bg-red-900" type="submit">Login</button>
            </div>
        </div>
    </form>
</div>
{{--    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full" action="{{ route('product.add') }}" method="POST">--}}
{{--        @csrf--}}
{{--        <div class="mb-4">--}}
{{--            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">--}}
{{--                Name--}}
{{--            </label>--}}
{{--            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="name" type="text" placeholder="Name"--}}
{{--                   value="{{ old('name') }}">--}}
{{--        </div>--}}
{{--        <div class="mb-4">--}}
{{--            <label class="block text-gray-700 text-sm font-bold mb-2" for="note">--}}
{{--                Notes--}}
{{--            </label>--}}
{{--            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="note" name="note" type="text" placeholder="Description"--}}
{{--                   value="{{ old('notes') }}">--}}
{{--        </div>--}}

{{--        <button class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">--}}
{{--            Add--}}
{{--        </button>--}}
{{--    </form>--}}




@endsection
