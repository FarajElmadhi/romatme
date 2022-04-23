@extends('admin.index')
@section('content')

@include("admin.layouts.components.submit_form_ajax",["form"=>"#brands"])
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
				<a href="{{ aurl('brands') }}"  style="color:#343a40"  class="dropdown-item">
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
								
{!! Form::open(['url'=>aurl('/brands'),'id'=>'brands','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="row">

<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('brand_name',trans('admin.brand_name'),['class'=>' control-label']) !!}
            {!! Form::text('brand_name',old('brand_name'),['class'=>'form-control','placeholder'=>trans('admin.brand_name')]) !!}
    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('brand_title',trans('admin.brand_title'),['class'=>' control-label']) !!}
            {!! Form::text('brand_title',old('brand_title'),['class'=>'form-control','placeholder'=>trans('admin.brand_title')]) !!}
    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('brand_description',trans('admin.brand_description'),['class'=>'control-label']) !!}
            {!! Form::textarea('brand_description',old('brand_description'),['class'=>'form-control ckeditor','placeholder'=>trans('admin.brand_description')]) !!}
    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
     @include("admin.dropzone",[
    "thumbnailWidth"=>"80",
    "thumbnailHeight"=>"80",
    "parallelUploads"=>"20",
    "maxFiles"=>"30",
    "maxFileSize"=>"",
    "acceptedMimeTypes"=>it()->acceptedMimeTypes("image"),
    "autoQueue"=>true,
    "dz_param"=>"brand_logo",
    "type"=>"create",
    "route"=>"brands",
    "path"=>"brands",
    ])
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('tags',trans('admin.tags'),['class'=>'control-label']) !!}
            {!! Form::textarea('tags',old('tags'),['class'=>'form-control','placeholder'=>trans('admin.tags')]) !!}
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