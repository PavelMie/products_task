@extends('layout')

@section('content')
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full" action="{{ route('product.add') }}" method="POST">
        <div class="mb-4">
            <a href="{{ route('products') }}" >< Back</a>
        </div>
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                Name
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror" id="name" name="name" type="text" placeholder="Name"
                   value="{{ old('name') }}">
            @error('name')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="note">
                Notes
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('note') border-red-500 @enderror" id="note" name="note" type="text" placeholder="Description"
                   value="{{ old('note') }}">
            @error('note')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
            Add
        </button>
    </form>
@endsection
