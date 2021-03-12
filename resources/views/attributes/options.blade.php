@extends('layouts.admin')

@section('content')

    <main class="main">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Option</li>
        </ol>
        <div class="container-fluid">
            <div class="animated fadeIn">
                <div class="row">
                      
                      <!-- BAGIAN INI AKAN MENG-HANDLE FORM INPUT NEW CATEGORY  -->
                    <div class="col-md-4">
                        @include('attributes.option_form')
                    </div>
                    
                    <!-- BAGIAN INI AKAN MENG-HANDLE FORM INPUT NEW CATEGORY  -->
    
                  
                    <!-- BAGIAN INI AKAN MENG-HANDLE TABLE LIST CATEGORY  -->
                    <div class="col-md-8">
                        <div class="card card-default">
                            <div class="card-header card-header-border-bottom">
                                <h2>Options for : {{ $attribute->name }}</h2>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-stripped">
                                    <thead>
                                        <th style="width:10%">#</th>
                                        <th>Name</th>
                                        <th style="width:30%">Action</th>
                                    </thead>
                                    <tbody>
                                        @forelse ($attribute->attributeOptions as $option)
                                            <tr>    
                                                <td>{{ $option->id }}</td>
                                                <td>{{ $option->name }}</td>
                                                <td>
                                                    <a href="{{ url('administrator/attributes/options/'. $option->id .'/edit') }}" class="btn btn-warning btn-sm">edit</a>
                                                    {!! Form::open(['url' => 'administrator/attributes/options/'. $option->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
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
                        </div>
                    </div>
                    <!-- BAGIAN INI AKAN MENG-HANDLE TABLE LIST CATEGORY  -->
                </div>
            </div>
        </div>
    </main>
@endsection