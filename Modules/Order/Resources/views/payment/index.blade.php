@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="{{asset('modules/order/css/payment.css')}}">
@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('modules/order/js/payment.js') }}"></script>
@endsection
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
                <button class="btn btn-success float-right" data-toggle="modal" data-target="#payment-new">Add</button>
                <div class="modal fade" id="payment-new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create payment</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="payment-admin payment-from-new" action="{{route('payment.create')}}"
                                      method="post">
                                    {!! csrf_field() !!}
                                    <div class="form-group">
                                        <label>Payment name</label>
                                        <input type="text" class="form-control payment-name-new"
                                               placeholder="Payment name" name="payment_name">
                                    </div>
                                    <div class="form-group">
                                        <label>Account</label>
                                        <textarea class="form-control payment-account-new" name="payment_account"
                                                  placeholder="Payment account"></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary button-payment-new">Create new payment
                                </button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Payment Name</th>
                        <th scope="col">Account<th>
                        <th scope="col">State</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($payments as $payment)
                        <tr class="payment-{{$payment['id']}}">
                            <th scope="row">{{$payment['id']}}</th>
                            <td>{{$payment['payment_method_name']}}</td>
                            <td>{{$payment['target_account']}}</td>
                            <td></td>
                            <td>
                                <label class="switch">
                                    <input type="checkbox" class="payment-status"
                                           data-value="{{$payment['id']}}" {{$payment['state'] == true ? 'checked': ''}}>
                                    <span class="slider round"></span>
                                </label>
                                <button class="btn btn-success" data-toggle="modal"
                                        data-target="#payment{{$payment['id']}}">Edit</button>
                                <button class="btn btn-danger payment-delete" data-value="{{$payment['id']}}">Delete</button>
                            </td>
                        </tr>
                        <div class="modal fade" id="payment{{$payment['id']}}" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit payment</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Payment name</label>
                                            <input type="text" class="form-control payment-name-{{$payment['id']}}"
                                                   value="{{$payment['payment_method_name']}}" name="payment_name">
                                            {{--                                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                                        </div>
                                        <div class="form-group">
                                            <label>Account</label>
                                            <textarea type="text" class="form-control payment-account-{{$payment['id']}}"
                                                      name="target_account">{{$payment['target_account']}}</textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" class="btn btn-primary button-payment-save"
                                               data-value="{{$payment['id']}}" value="Save changes">
                                        <input type="button" class="btn btn-secondary" data-dismiss="modal"
                                               value="Close">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

