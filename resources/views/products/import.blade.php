@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        {{ __('Upload Excel') }}
                        <a href="{{ route('products.index') }}"
                            class="btn btn-link text-decoration-none">Home</a>
                    </div>

                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-{{ session('type') }}"
                                role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <form action="{{ route('products.upload') }}"
                            method="post"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file"
                                        name="file"
                                        class="custom-file-input"
                                        id="validatedCustomFile"
                                        aria-describedby="inputGroupExcelFileAddon">
                                    <label class="custom-file-label"
                                        for="validatedCustomFile">Choose an excel file</label>
                                </div>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary"
                                        type="submit"
                                        id="inputGroupExcelFileAddon">Upload</button>
                                </div>
                            </div>

                            @error('file')
                                <div class="text-danger text-center">
                                    {{ $message }}
                                </div>
                            @enderror

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
