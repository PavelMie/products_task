@extends('layout')

@section('content')
    <div id="profile" class="w-full  rounded-lg lg:rounded-l-lg lg:rounded-r-none shadow-2xl bg-white opacity-75 mx-6 lg:mx-0 p-4">
        <div class="flex p-4 md:p-12 text-center lg:text-left">
            <h1 class="text-3xl font-bold pt-8 lg:pt-0">Produkty</h1>
            @if (auth()->check())
                <form action="{{ route('logout') }}" method="POST" class="pt-8 lg:pt-0 float-right ml-auto">
                    @csrf
                    <button
                        class="text-3xl font-bold "
                        type="submit">Logout
                    </button>
                </form>
            @else
                <a      href="{{ route('login') }}" class="text-3xl font-bold pt-8 lg:pt-0 float-right ml-auto">Login</a>
            @endif
        </div>
        @if (auth()->check())
            <div class="text-center py-4 lg:text-left">
                <a      href="{{ route('products.add') }}" class="btn btn-primary">Add new</a>
            </div>
        @endif
        <table  class="table w-full table-bordered yajra-datatable p-0 border-left-0 border-right-0">
            <thead>
                <tr >
                    <th >Product</th>
                    <th >Actions</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>



<script type="text/javascript">

    var table = $('.yajra-datatable').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: '{{ route('getproducts') }}',
        columns: [
            { data: 'name', name: 'name' },
            // { data: 'version', name: 'version' },
            // { data: 'price', name: 'price' },
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        order: [[0, 'asc']]
    });

    $('.yajra-datatable').on('click', '.btn-delete[data-remote]', function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = $(this).data('remote');
        // confirm then
        $.ajax({
            url: url,
            type: 'DELETE',
            dataType: 'json',
            data: {method: '_DELETE', submit: true}
        }).always(function (data) {
            $('.yajra-datatable').DataTable().draw(false);
        });
    });
</script>
@endsection

