@php
use Illuminate\Support\Str;
@endphp

@extends('layouts.app')

@section('content')

<div class="container">

    {{-- Success Message --}}
    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h4>Product List</h4>

            <a href="{{ route('products.create') }}"
               class="btn btn-primary">

                Add Product

            </a>

        </div>

        <div class="card-body">

            {{-- Search Form --}}
            <form action="{{ route('products.index') }}"
                  method="GET"
                  class="mb-4">

                <div class="row">

                    <div class="col-md-10">

                        <input type="text"
                               name="search"
                               class="form-control"
                               placeholder="Search by title or description"
                               value="{{ request('search') }}">

                    </div>

                    <div class="col-md-2">

                        <button type="submit"
                                class="btn btn-success w-100">

                            Search

                        </button>

                    </div>

                </div>

            </form>

            {{-- Product Table --}}
            <div class="table-responsive">

                <table class="table table-bordered table-striped">

                    <thead class="table-dark">

                        <tr>

                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Date Available</th>
                            <th width="180">Actions</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($products as $product)

                            <tr>

                                <td>{{ $product->id }}</td>

                                <td>{{ $product->title }}</td>

                                <td>

                                    {!! Str::limit(strip_tags($product->description), 80) !!}

                                </td>

                                <td>

                                    ₹ {{ number_format($product->price, 2) }}

                                </td>

                                <td>

                                    {{ $product->date_available }}

                                </td>

                                <td>

                                    <a href="{{ route('products.edit', $product->id) }}"
                                       class="btn btn-warning btn-sm">

                                        Edit

                                    </a>

                                    <form action="{{ route('products.destroy', $product->id) }}"
                                          method="POST"
                                          class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this product?')">

                                            Delete

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6"
                                    class="text-center">

                                    No Products Found

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            {{-- Pagination --}}
            <div class="mt-3">

                {{ $products->links() }}

            </div>

        </div>

    </div>

</div>

@endsection