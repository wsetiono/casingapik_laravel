@extends('layouts.admin')

@section('title')
    <title>Edit Attribute</title>
@endsection

@php
    $formTitle = !empty($attribute) ? 'Update' : 'New';
    $disableInput = !empty($attribute) ? true : false;
@endphp

@section('content')

    <main class="main">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Edit Attribute</li>
        </ol>
        <div class="container-fluid">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Attribute</h4>
                            </div>
                            <div class="card-body">
                              
                                @include('partials.flash', ['$errors' => $errors])

                                @if (!empty($attribute))
                                    {!! Form::model($attribute, ['url' => ['administrator/attributes', $attribute->id], 'method' => 'PUT']) !!}
                                    {!! Form::hidden('id') !!}
                                @else
                                    {!! Form::open(['url' => 'administrator/attributes']) !!}
                                @endif
                                    <fieldset class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <legend class="col-form-label pt-0">General</legend>
                                                <div class="form-group">
                                                    {!! Form::label('code', 'Code') !!}
                                                    {!! Form::text('code', null, ['class' => 'form-control', 'readonly' => $disableInput]) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('name', 'Name') !!}
                                                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                                </div>
                                                <div class="form-group">
                                                        {!! Form::label('type', 'Type') !!}
                                                        {!! Form::select('type', $types , null, ['class' => 'form-control', 'placeholder' => '-- Set Type --', 'readonly' => $disableInput]) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <legend class="col-form-label pt-0">Validation</legend>
                                                <div class="form-group">
                                                        {!! Form::label('is_required', 'Is Required?') !!}
                                                        {!! Form::select('is_required', $booleanOptions , null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                                </div>
                                                <div class="form-group">
                                                        {!! Form::label('is_unique', 'Is Unique?') !!}
                                                        {!! Form::select('is_unique', $booleanOptions , null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                                </div>
                                                <div class="form-group">
                                                        {!! Form::label('validation', 'Validation') !!}
                                                        {!! Form::select('validation', $validations , null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <legend class="col-form-label pt-0">Configuration</legend>
                                                    <div class="form-group">
                                                            {!! Form::label('is_configurable', 'Use in Configurable Product?') !!}
                                                            {!! Form::select('is_configurable', $booleanOptions , null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                                    </div>
                                                    <div class="form-group">
                                                            {!! Form::label('is_filterable', 'Use in Filtering Product?') !!}
                                                            {!! Form::select('is_filterable', $booleanOptions , null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    <div class="form-footer pt-5 border-top">
                                        <button type="submit" class="btn btn-primary btn-default">Save</button>
                                        <a href="{{ url('administrator/attributes') }}" class="btn btn-secondary btn-default">Back</a>
                                    </div>
                                {!! Form::close() !!}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection