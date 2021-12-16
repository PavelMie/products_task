@extends('layout')

@section('content')
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full" action="{{ route('product.edit') }}" method="POST" id="save_product">

        <div class="mb-4">
            <a href="{{ route('products') }}" >< Back</a>
        </div>
        @csrf
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="id" name="id" hidden
               value="{{ $product->id }}">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                Name
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="name" type="text" placeholder="Name"
                   value="{{ $product->name }}">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="note">
                Notes
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="note" name="note" type="text" placeholder="Description"
                   value="{{ $product->note }}">
        </div>
        @foreach ($prices as $price)
            <div class="flex w-full">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="version">
                        Version
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="version" name="version_{{ $price->id }}" type="text" placeholder="Version"
                           value="{{ $price->version }}">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
                        Price
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="price" name="price_{{ $price->id }}" type="number" step="0.01" placeholder="Price"
                           value="{{ $price->price }}">
                </div>
            </div>
            <button class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="button"
                    onclick="document.getElementById('price_id').value='{{ $price->id }}';document.getElementById('delete_price_form').submit();">
                Delete
            </button>
        @endforeach
        <br>
        <button class="mt-4 bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="button" onclick="document.getElementById('save_product').submit();">
            Save
        </button>
    </form>
    <form action="{{ route('price.delete') }}" method="POST" id="delete_price_form" hidden>
        @csrf
        <input id="price_id" name="price_id" value="">
    </form>
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full" action="{{ route('price.add') }}" method="POST">
        @csrf
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="product_id" name="product_id" hidden
               value="{{ $product->id }}">
        <div class="flex w-full">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="version">
                    Version
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="version" name="version" type="text" placeholder="Version"
                       value="{{ old('version') }}">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
                    Price
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="price" name="price" type="number" step="0.01" placeholder="Price"
                       value="{{ old('price') }}">
            </div>
        </div>
        <button class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
            Add
        </button>
    </form>
@endsection
