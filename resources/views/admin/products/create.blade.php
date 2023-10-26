@extends('admin.layouts.layout')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('products.products_title') }}</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{ __('products.add_product') }}</h3>
                            </div>
                            <!-- /.card-header -->

                            <form action="{{ route('admin.products.store') }}"
                                  role="form" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="name">{{ __('products.name') }}</label>
                                        <input type="text" name="name" class="form-control
                        @error('name') is-invalid @enderror" id="name" placeholder="{{ __('products.name') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="description">{{ __('products.description') }}</label>
                                        <textarea name="description" class="form-control
                                        @error('name') is-invalid @enderror" id="description" rows="4" placeholder="{{ __('products.description') }}"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="price">{{ __('products.price') }}</label>
                                        <input type="number" class="form-control
                                        @error('name') is-invalid @enderror" id="price" name="price" step="0.01" placeholder="{{ __('products.price') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="thumbnail">{{ __('products.product_photo') }}</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="thumbnail" class="custom-file-input" id="thumbnail">
                                                <label class="custom-file-label" for="thumbnail">{{ __('products.select_file') }}</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">{{ __('products.create') }}</button>
                                </div>
                            </form>

                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
