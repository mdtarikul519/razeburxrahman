@extends('layouts.admin')
@section('contents')
<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Dash board</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
                <li class="breadcrumb-item active">Dash board</li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">

        <div id="app">
            <example-component></example-component>
        </div>
       
        <script src="{{ asset('js/app.js') }}"></script>
    </div>

@endsection