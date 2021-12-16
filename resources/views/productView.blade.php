@extends('layout')

@section('content')
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full" >
        <div class="mb-4">
            <a href="{{ route('products') }}" >< Back</a>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                Name : {{ $product->name }}
            </label>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="note">
                Notes : {{ $product->note }}
            </label>
        </div>
        @foreach ($prices as $price)
            <div class="flex w-full">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="version">
                        Version : {{ $price->version }}
                    </label>
                </div>
                <div class="ml-12 mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
                        Price : {{ $price->price }}
                    </label>
                </div>
            </div>
        @endforeach
    </div>
@endsection
