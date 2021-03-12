<div class="card card-default">
    <div class="card-header card-header-border-bottom">
            <h2>Option Baru</h2>
    </div>
    <div class="card-body">
        @include('partials.flash', ['$errors' => $errors])
        @if (!empty($attributeOption))
            {!! Form::model($attributeOption, ['url' => ['administrator/attributes/options', $attributeOption->id], 'method' => 'PUT']) !!}
            {!! Form::hidden('id') !!}
        @else
            {!! Form::open(['url' => ['administrator/attributes/options', $attribute->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        @endif
        {!! Form::hidden('attribute_id', $attribute->id) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-footer pt-5 border-top">
            <button type="submit" class="btn btn-primary btn-default">Save</button>
            <a href="{{ url('administrator/attributes/') }}" class="btn btn-secondary btn-default">Back</a>
        </div>
        {!! Form::close() !!}
    </div>
</div> 