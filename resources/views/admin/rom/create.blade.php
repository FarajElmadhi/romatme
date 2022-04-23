@extends('admin.index')
@section('content')

@include("admin.layouts.components.submit_form_ajax",["form"=>"#rom"])
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
				<a href="{{ aurl('rom') }}"  style="color:#343a40"  class="dropdown-item">
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
								
{!! Form::open(['url'=>aurl('/rom'),'id'=>'rom','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="row">

<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
	<div class="form-group">
		{!! Form::label('brand_id',trans('admin.brand_id')) !!}
		{!! Form::select('brand_id',App\Models\Brand::pluck('brand_name','id'),old('brand_id'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
	</div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
	<div class="form-group">
		{!! Form::label('category_id',trans('admin.category_id')) !!}
		{!! Form::select('category_id',App\Models\Category::pluck('category_name','id'),old('category_id'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
	</div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('model',trans('admin.model'),['class'=>' control-label']) !!}
            {!! Form::text('model',old('model'),['class'=>'form-control','placeholder'=>trans('admin.model')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('model_name',trans('admin.model_name'),['class'=>' control-label']) !!}
            {!! Form::text('model_name',old('model_name'),['class'=>'form-control','placeholder'=>trans('admin.model_name')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('region',trans('admin.region'),['class'=>' control-label']) !!}
            {!! Form::text('region',old('region'),['class'=>'form-control','placeholder'=>trans('admin.region')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('baseband',trans('admin.baseband'),['class'=>' control-label']) !!}
            {!! Form::text('baseband',old('baseband'),['class'=>'form-control','placeholder'=>trans('admin.baseband')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('security_level',trans('admin.security_level'),['class'=>' control-label']) !!}
            {!! Form::text('security_level',old('security_level'),['class'=>'form-control','placeholder'=>trans('admin.security_level')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('security_date',trans('admin.security_date'),['class'=>' control-label']) !!}
            {!! Form::text('security_date',old('security_date'),['class'=>'form-control','placeholder'=>trans('admin.security_date')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
	<div class="form-group">
		{!! Form::label('version_id',trans('admin.version_id')) !!}
		{!! Form::select('version_id',App\Models\Version::pluck('version','id'),old('version_id'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
	</div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('build date',trans('admin.build date'),['class'=>' control-label']) !!}
            {!! Form::text('build date',old('build date'),['class'=>'form-control','placeholder'=>trans('admin.build date')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('status',trans('admin.status'),['class'=>' control-label']) !!}
            {!! Form::text('status',old('status'),['class'=>'form-control','placeholder'=>trans('admin.status')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('url1',trans('admin.url1'),['class'=>' control-label']) !!}
            {!! Form::text('url1',old('url1'),['class'=>'form-control','placeholder'=>trans('admin.url1')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('url2',trans('admin.url2'),['class'=>' control-label']) !!}
            {!! Form::text('url2',old('url2'),['class'=>'form-control','placeholder'=>trans('admin.url2')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('url3',trans('admin.url3'),['class'=>' control-label']) !!}
            {!! Form::text('url3',old('url3'),['class'=>'form-control','placeholder'=>trans('admin.url3')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('views',trans('admin.views'),['class'=>' control-label']) !!}
            {!! Form::text('views',old('views'),['class'=>'form-control','placeholder'=>trans('admin.views')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('info',trans('admin.info'),['class'=>'control-label']) !!}
            {!! Form::textarea('info',old('info'),['class'=>'form-control ckeditor','placeholder'=>trans('admin.info')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('tags',trans('admin.tags'),['class'=>' control-label']) !!}
            {!! Form::text('tags',old('tags'),['class'=>'form-control','placeholder'=>trans('admin.tags')]) !!}
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
    "route"=>"rom",
    "path"=>"rom",
    ])
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('root_mode',trans('admin.root_mode'),['class'=>' control-label']) !!}
            {!! Form::text('root_mode',old('root_mode'),['class'=>'form-control','placeholder'=>trans('admin.root_mode')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('key_id',trans('admin.key_id'),['class'=>' control-label']) !!}
            {!! Form::text('key_id',old('key_id'),['class'=>'form-control','placeholder'=>trans('admin.key_id')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('imei',trans('admin.imei'),['class'=>' control-label']) !!}
            {!! Form::text('imei',old('imei'),['class'=>'form-control','placeholder'=>trans('admin.imei')]) !!}
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