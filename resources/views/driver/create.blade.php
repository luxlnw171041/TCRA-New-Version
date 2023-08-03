@extends('layouts.theme')

@section('content')
<style>
    .radio-inputs {
        display: flex;
        justify-content: center;
        align-items: center;
        max-width: 350px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .radio-inputs>* {
        margin: 6px;
    }

    .radio-input:checked+.radio-tile {
        border-color: #0a58ca;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        color: #0a58ca;
    }

    .radio-input:checked+.radio-tile:before {
        transform: scale(1);
        opacity: 1;
        background-color: #0a58ca;
        border-color: #0a58ca;
    }

    .radio-input:checked+.radio-tile .radio-icon svg {
        fill: #0a58ca;
    }

    .radio-input:checked+.radio-tile .radio-label {
        color: #0a58ca;
    }

    .radio-input:focus+.radio-tile {
        border-color: #0a58ca;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1), 0 0 0 4px rgb(10, 88, 202, 0.3);
        ;
    }

    .radio-input:focus+.radio-tile:before {
        transform: scale(1);
        opacity: 1;
    }

    .radio-tile {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 100%;
        min-height: 50px;
        border-radius: 0.5rem;
        border: 2px solid #b5bfd9;
        background-color: #fff;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        transition: 0.15s ease;
        cursor: pointer;
        position: relative;
    }

    .radio-tile:before {
        content: "";
        position: absolute;
        display: block;
        width: 0.75rem;
        height: 0.75rem;
        border: 2px solid #b5bfd9;
        background-color: #fff;
        border-radius: 50%;
        top: 0.25rem;
        left: 0.25rem;
        opacity: 0;
        transform: scale(0);
        transition: 0.25s ease;
    }

    .radio-tile:hover {
        border-color: #0a58ca;
    }

    .radio-tile:hover:before {
        transform: scale(1);
        opacity: 1;
    }

    .radio-icon svg {
        width: 2rem;
        height: 2rem;
        fill: #494949;
    }

    .radio-label {
        color: #707070;
        transition: 0.375s ease;
        text-align: center;
        font-size: 13px;
    }

    .radio-input {
        clip: rect(0 0 0 0);
        -webkit-clip-path: inset(100%);
        clip-path: inset(100%);
        height: 1px;
        overflow: hidden;
        position: absolute;
        white-space: nowrap;
        width: 1px;
    }
</style>

 <form id="formCreateDriver" method="POST" action="{{ url('/driver') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        @include ('driver.form', ['formMode' => 'create'])

                    </form>
<!-- <div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Create New Driver</div>
                <div class="card-body">
                    <a href="{{ url('/driver') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <br />
                    <br />

                    @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                   

                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection