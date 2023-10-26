@extends('admin.layouts.layout')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('orders.order_title') }}</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
            <div class="card-body">

                @if (count($orders))
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th style="width: 30px">#</th>
                                <th>{{ __('orders.product_name') }}</th>
                                <th>{{ __('orders.status') }}</th>
                                <th>{{ __('orders.price') }}</th>
                                <th>{{ __('orders.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->product->name }}</td>
                                    <td>{{ $order->cart->status }}</td>
                                    <td>{{ $order->product->price }}</td>
                                    <td>
                                        <form method="post" action="{{ route('admin.orders.approved', ['id' => $order->id]) }}" class="float-left mr-3">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-block btn-success btn-sm">
                                                <i class="fas fa-check-circle"></i>
                                                {{ __('orders.confirm_order') }}
                                            </button>
                                        </form>

                                        <!-- Форма для отклонения заказа -->
                                        <form method="post" action="{{ route('admin.orders.reject', ['id' => $order->id]) }}" class="float-left">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-times-circle"></i>
                                                {{ __('orders.reject_order') }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p>{{ __('orders.not_order') }}</p>
                @endif

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                {{ $orders->links() }}
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>

@endsection
