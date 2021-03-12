@extends('layouts.admin')

@section('title')
    <title>List Attribute</title>
@endsection

@php
    $formTitle = !empty($attribute) ? 'Update' : 'New';
    $disableInput = !empty($attribute) ? true : false;
@endphp

@section('content')

    <main class="main">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Attribute</li>
        </ol>
        <div class="container-fluid">
            <div class="animated fadeIn">
                <div class="row">
                      
                      <!-- BAGIAN INI AKAN MENG-HANDLE FORM INPUT NEW CATEGORY  -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Attribute Baru</h4>
                            </div>
                            <div class="card-body">
                              
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
                    
                    <!-- BAGIAN INI AKAN MENG-HANDLE FORM INPUT NEW CATEGORY  -->
    
                  
                    <!-- BAGIAN INI AKAN MENG-HANDLE TABLE LIST CATEGORY  -->
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">List Attributes</h4>
                            </div>
                            <div class="card-body">
                                {{-- @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
    
                                @if (session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif --}}
    
                                @include('partials.flash')

                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Code</th>
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <!-- LOOPING DATA KATEGORI SESUAI JUMLAH DATA YANG ADA DI VARIABLE $CATEGORY -->
                                              @forelse ($attributes as $attribute)
                                              <tr>    
                                                  <td>{{ $attribute->id }}</td>
                                                  <td>{{ $attribute->code }}</td>
                                                  <td>{{ $attribute->name }}</td>
                                                  <td>{{ $attribute->type }}</td>
                                                  <td>
                                                      <a href="{{ url('administrator/attributes/'. $attribute->id .'/edit') }}" class="btn btn-warning btn-sm">edit</a>
                                                      @if ($attribute->type == 'select')
                                                      <a href="{{ url('administrator/attributes/'. $attribute->id .'/options') }}" class="btn btn-success btn-sm">options</a>
                                                      @endif
                                                      {!! Form::open(['url' => 'administrator/attributes/'. $attribute->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
                                                      {!! Form::hidden('_method', 'DELETE') !!}
                                                      {!! Form::submit('remove', ['class' => 'btn btn-danger btn-sm']) !!}
                                                      {!! Form::close() !!}
                                                  </td>
                                              </tr>
                                          @empty
                                              <tr>
                                                  <td colspan="5">No records found</td>
                                              </tr>
                                          @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <!-- FUNGSI INI AKAN SECARA OTOMATIS MEN-GENERATE TOMBOL PAGINATION  -->
                                {!! $attributes->links() !!}
                            </div>
                        </div>
                    </div>
                    <!-- BAGIAN INI AKAN MENG-HANDLE TABLE LIST CATEGORY  -->
                </div>
            </div>
        </div>
    </main>
@endsection