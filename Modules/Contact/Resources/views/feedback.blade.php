@extends('layouts.admin')
@section('js')
    <script type="text/javascript" src="{{ asset('modules/contact/js/feedback.js') }}"></script>
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
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Email</th>
                        <th scope="col" style="max-width: 300px">Content</th>
                        <th scope="col">Create at</th>
                        <th scope="col">State</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($feedbacks as $feedback)
                        <tr class="contact-{{$feedback['id']}}">
                            <th scope="row">{{$feedback['id']}}</th>
                            <td>{{$feedback['email']}}</td>
                            <td style="max-width: 300px">{{$feedback['content']}}</td>
                            <td>{{$feedback['created_at']}}</td>
                            @if ($feedback['is_solved'] == true)
                                <td>
                                    <i class="far fa-check-circle fa-2x" style="color: green"></i>
                                    <small>At {{$feedback['updated_at']}}</small>
                                </td>
                            @else
                                <td>
                                    <button data-value="{{$feedback['id']}}" class="buton-solved btn btn-primary">
                                        Solved
                                    </button>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
