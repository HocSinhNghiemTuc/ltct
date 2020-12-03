@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="{{asset('modules/contact/css/contact.css')}}">
@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('modules/contact/js/contact.js') }}"></script>
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
                <button class="btn btn-success float-right" data-toggle="modal" data-target="#contact-new">Add</button>
                <div class="modal fade" id="contact-new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create Contact</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="contact-admin contact-from-new" action="{{route('contact.create')}}"
                                      method="post">
                                    {!! csrf_field() !!}
                                    <div class="form-group">
                                        <label>Contact name</label>
                                        <input type="text" class="form-control contact-name-new"
                                               placeholder="Contact Name" name="contact_name">
                                        {{--                                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                                    </div>
                                    <div class="form-group">
                                        <label>Contact link</label>
                                        <textarea class="form-control contact-link-new" name="contact_value"
                                                  placeholder="Contact Link"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="form-group col-8">
                                                <div class="form-inline" style="margin-bottom: 1rem;">
                                                    <label class="col-2 col-form-label">Icon</label>
                                                    <input type="text"
                                                           class="offset-1 col-7 form-control contact-icon-new"
                                                           placeholder="Icon" name="contact_icon">
                                                    <small class="offset-3">Get from <a class="link-font"
                                                                                        href="https://fontawesome.com/">fontawesome.com</a></small>
                                                </div>
                                                <div class="form-inline">
                                                    <label class="col-2 col-form-label">Color</label>
                                                    <input type="color" class="offset-1 contact-color-new"
                                                           value="#FF0000" name="contact_color">
                                                </div>
                                            </div>
                                            <i style="color: red"></i>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary button-contact-new">Create new contact
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
                        <th scope="col">Contact Name</th>
                        <th scope="col">Contact Link</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Action</th>
                        <th scope="col">Show all</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contacts as $contact)
                        <tr class="contact-{{$contact['id']}}">
                            <th scope="row">{{$contact['id']}}</th>
                            <td>{{$contact['contact_name']}}</td>
                            <td>{{$contact['contact_value']}}</td>
                            <td><i class="fab fa-{{$contact['icon']}} fa-3x" style="color: {{$contact['color']}}"></i>
                            </td>
                            <td>
                                <label class="switch">
                                    <input type="checkbox" class="contact-status"
                                           data-value="{{$contact['id']}}" {{$contact['status'] == true ? 'checked': ''}}>
                                    <span class="slider round"></span>
                                </label>
                                <button class="btn btn-success" data-toggle="modal"
                                        data-target="#contact{{$contact['id']}}">Edit
                                </button>
                                <button class="btn btn-danger contact-delete" data-value="{{$contact['id']}}">Delete
                                </button>
                            </td>
                            <td>
                                <label class="switch">
                                    <input type="checkbox" class="contact-show"
                                           data-value="{{$contact['id']}}" {{$contact['show?'] == true ? 'checked': ''}}>
                                    <span class="slider round"></span>
                                </label>
                            </td>
                        </tr>
                        <div class="modal fade" id="contact{{$contact['id']}}" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Contact</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Contact name</label>
                                            <input type="text" class="form-control contact-name-{{$contact['id']}}"
                                                   value="{{$contact['contact_name']}}" name="contact_name">
                                            {{--                                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                                        </div>
                                        <div class="form-group">
                                            <label>Contact link</label>
                                            <textarea class="form-control contact-link-{{$contact['id']}}"
                                                      name="contact_value">{{$contact['contact_value']}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="form-group col-8">
                                                    <div class="form-inline" style="margin-bottom: 1rem;">
                                                        <label class="col-2 col-form-label">Icon</label>
                                                        <input type="text"
                                                               class="offset-1 col-7 form-control contact-icon contact-icon-{{$contact['id']}}"
                                                               data-value="{{$contact['id']}}"
                                                               value="{{$contact['icon']}}" name="contact_icon">
                                                        <small class="offset-3">
                                                            Get from <a class="link-font"
                                                                        href="https://fontawesome.com/">fontawesome.com</a>
                                                        </small>
                                                    </div>
                                                    <div class="form-inline">
                                                        <label class="col-2 col-form-label">Color</label>
                                                        <input type="color"
                                                               class="offset-1 contact-color contact-color-{{$contact['id']}}"
                                                               value="{{$contact['color']}}"
                                                               data-value="{{$contact['id']}}" name="contact_color">
                                                    </div>
                                                </div>
                                                <i id="contact-icon-{{$contact['id']}}"
                                                   class="offset-1 {{$contact['icon']}} fa-5x"
                                                   style="color: {{$contact['color']}}"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" class="btn btn-primary button-contact-save"
                                               data-value="{{$contact['id']}}" value="Save changes">
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

