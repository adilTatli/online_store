@extends('admin.layouts.layout')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('orders.confirmed_orders_title') }}</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card-body">

                @if (count($confirmedOrders))
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th style="width: 30px">#</th>
                                <th>{{ __('orders.product_name') }}</th>
                                <th>{{ __('orders.status') }}</th>
                                <th>{{ __('orders.price') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($confirmedOrders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->product->name }}</td>
                                    <td>{{ $order->cart->status }}</td>
                                    <td>{{ $order->product->price }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p>{{ __('orders.confirmed_order_not') }}</p>
                @endif

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                {{ $confirmedOrders->links() }}
            </div>
            <!-- /.card-footer-->
    </div>
    <!-- /.card -->

    </section>
    <!-- /.content -->
    </div>

@endsection
