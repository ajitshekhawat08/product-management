@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header d-flex justify-content-between align-items-center">

                    <h4>Create Product</h4>

                    <a href="{{ route('products.index') }}"
                       class="btn btn-secondary btn-sm">
                        Back
                    </a>

                </div>

                <div class="card-body">

                    {{-- Validation Errors --}}
                    @if ($errors->any())

                        <div class="alert alert-danger">

                            <ul class="mb-0">

                                @foreach ($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif

                    <form action="{{ route('products.store') }}"
                          method="POST">

                        @csrf

                        {{-- Title --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Product Title
                            </label>

                            <input type="text"
                                   name="title"
                                   class="form-control @error('title') is-invalid @enderror"
                                   placeholder="Enter product title"
                                   value="{{ old('title') }}">

                            @error('title')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                        {{-- Description --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Description
                            </label>

                            <textarea name="description"
                                      id="description"
                                      rows="6"
                                      class="form-control @error('description') is-invalid @enderror"
                                      placeholder="Enter product description">{{ old('description') }}</textarea>

                            @error('description')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                        {{-- Price --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Price
                            </label>

                            <input type="number"
                                   step="0.01"
                                   min="0"
                                   name="price"
                                   class="form-control @error('price') is-invalid @enderror"
                                   placeholder="Enter product price"
                                   value="{{ old('price') }}">

                            @error('price')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                        {{-- Date Available --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Date Available
                            </label>

                            <input type="date"
                                   name="date_available"
                                   class="form-control @error('date_available') is-invalid @enderror"
                                   value="{{ old('date_available') }}">

                            @error('date_available')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                        {{-- Submit Button --}}
                        <div class="d-grid">

                            <button type="submit"
                                    class="btn btn-primary">

                                Save Product

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

{{-- CKEditor --}}
<script src="https://cdn.ckeditor.com/4.25.1/standard/ckeditor.js"></script>

<script>

    CKEDITOR.replace('description');

</script>

@endsection