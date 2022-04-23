@extends('admin.index')
@section('content')

@include("admin.layouts.components.submit_form_ajax",["form"=>"#catergory"])
<div class="card card-dark">
	<div class="card-header">
		<h3 class="card-title">
		<div class="">
			<span>
			{{ !empty($title)?$title:'' }}
			</span>
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<span class="caret"></span>
			<span class="sr-only"></span>
			</a>
			<div class="dropdown-menu" role="menu">
				<a href="{{ aurl('catergory') }}"  style="color:#343a40"  class="dropdown-item">
				<i class="fas fa-list"></i> {{ trans('admin.show_all') }}</a>
			</div>
		</div>
		</h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
								
{!! Form::open(['url'=>aurl('/catergory'),'id'=>'catergory','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="row">

<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('category_name',trans('admin.category_name'),['class'=>' control-label']) !!}
            {!! Form::text('category_name',old('category_name'),['class'=>'form-control','placeholder'=>trans('admin.category_name')]) !!}
    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
	<div class="form-group">
		{!! Form::label('brand_id',trans('admin.brand_id')) !!}
		{!! Form::select('brand_id',App\Models\Brand::pluck('brand_name','id'),old('brand_id'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
	</div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('title',trans('admin.title'),['class'=>' control-label']) !!}
            {!! Form::text('title',old('title'),['class'=>'form-control','placeholder'=>trans('admin.title')]) !!}
    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('description',trans('admin.description'),['class'=>'control-label']) !!}
            {!! Form::textarea('description',old('description'),['class'=>'form-control ckeditor','placeholder'=>trans('admin.description')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('slug',trans('admin.slug'),['class'=>' control-label']) !!}
            {!! Form::text('slug',old('slug'),['class'=>'form-control','placeholder'=>trans('admin.slug')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('tags',trans('admin.tags'),['class'=>'control-label']) !!}
            {!! Form::textarea('tags',old('tags'),['class'=>'form-control','placeholder'=>trans('admin.tags')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
     @include("admin.dropzone",[
    "thumbnailWidth"=>"80",
    "thumbnailHeight"=>"80",
    "parallelUploads"=>"20",
    "maxFiles"=>"30",
    "maxFileSize"=>"",
    "acceptedMimeTypes"=>it()->acceptedMimeTypes(""),
    "autoQueue"=>true,
    "dz_param"=>"thumbnail",
    "type"=>"create",
    "route"=>"catergory",
    "path"=>"catergory",
    ])
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('views',trans('admin.views'),['class'=>' control-label']) !!}
            {!! Form::text('views',old('views'),['class'=>'form-control','placeholder'=>trans('admin.views')]) !!}
    </div>
</div>

</div>
		<!-- /.row -->
	</div>
	<!-- /.card-body -->
	<div class="card-footer"><button type="submit" name="add" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> {{ trans('admin.add') }}</button>
<button type="submit" name="add_back" class="btn btn-success btn-flat"><i class="fa fa-plus"></i> {{ trans('admin.add_back') }}</button>
{!! Form::close() !!}	</div>
</div>
@endsection