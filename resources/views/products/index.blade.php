@extends('layouts.app')

@section('style')
    <style>
        .pagination {
            margin: 0;
        }

    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        {{ __('Products') }}
                        <a
                        {{-- onclick="
                                event.preventDefault();
                                document.getElementById('products-export').submit();
                            " --}}
                            href="{{ route('products.export') }}"
                            class="btn btn-outline-primary">Export</a>
                        {{-- <form id="products-export"
                            action="{{ route('products.export') }}"
                            method="post"
                            style="display: none;"
                            class="d-none">
                            @csrf
                        </form> --}}
                    </div>

                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-{{ session('type') }}"
                                role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <table class="table table-bordered my-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->code }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->price }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No Products Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5">
                                        {!! $products->appends(request()->input())->links() !!}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
