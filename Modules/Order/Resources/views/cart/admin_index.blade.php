@extends('layouts.admin')
{{--@section('css')--}}
{{--    <link rel="stylesheet" href="{{asset('modules/order/css/payment.css')}}">--}}
{{--@endsection--}}
{{--@section('js')--}}
{{--    <script type="text/javascript" src="{{ asset('modules/order/js/payment.js') }}"></script>--}}
{{--@endsection--}}
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Starter Page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Starter Page</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">CardID</th>
                        <th scope="col">UserID</th>
                        <th scope="col">Payment Name</th>
                        <th scope="col">Total Bill<th>
                        <th scope="col">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($carts as $cart)
                        <tr>
                            <th scope="row">{{$cart['id']}}</th>
                            <td>{{$cart['user_id']}}</td>
                            <td>{{$cart->paymentName()}}</td>
                            <td>{{$cart->totalBill()}}</td>
                            <td></td>
                            <td>{{$cart->state()}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

