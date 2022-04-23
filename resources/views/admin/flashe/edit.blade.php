@extends('admin.index')
@section('content')

@include("admin.layouts.components.submit_form_ajax",["form"=>"#flashe"])
<div class="card card-dark">
	<div class="card-header">
		<h3 class="card-title">
		<div class="">
			<span>{{!empty($title)?$title:''}}</span>
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<span class="caret"></span>
			<span class="sr-only"></span>
			</a>
			<div class="dropdown-menu" role="menu">
				<a href="{{aurl('flashe')}}" class="dropdown-item" style="color:#343a40">
				<i class="fas fa-list"></i> {{trans('admin.show_all')}} </a>
				<a href="{{aurl('flashe/'.$flashe->id)}}" class="dropdown-item" style="color:#343a40">
				<i class="fa fa-eye"></i> {{trans('admin.show')}} </a>
				<a class="dropdown-item" style="color:#343a40" href="{{aurl('flashe/create')}}">
					<i class="fa fa-plus"></i> {{trans('admin.create')}}
				</a>
				<div class="dropdown-divider"></div>
				<a data-toggle="modal" data-target="#deleteRecord{{$flashe->id}}" class="dropdown-item" style="color:#343a40" href="#">
					<i class="fa fa-trash"></i> {{trans('admin.delete')}}
				</a>
			</div>
		</div>
		</h3>
		@push('js')
		<div class="modal fade" id="deleteRecord{{$flashe->id}}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">{{trans('admin.delete')}}</h4>
						<button class="close" data-dismiss="modal">x</button>
					</div>
					<div class="modal-body">
						<i class="fa fa-exclamation-triangle"></i>   {{trans('admin.ask_del')}} {{trans('admin.id')}}  ({{$flashe->id}})
					</div>
					<div class="modal-footer">
						{!! Form::open([
						'method' => 'DELETE',
						'route' => ['flashe.destroy', $flashe->id]
						]) !!}
						{!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger btn-flat']) !!}
						<a class="btn btn-default btn-flat" data-dismiss="modal">{{trans('admin.cancel')}}</a>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
		@endpush
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
										
{!! Form::open(['url'=>aurl('/flashe/'.$flashe->id),'method'=>'put','id'=>'flashe','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="row">

<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
		<div class="form-group">
				{!! Form::label('brand_id',trans('admin.brand_id'),['class'=>'control-label']) !!}
{!! Form::select('brand_id',App\Models\Brand::pluck('brand_name','id'), $flashe->brand_id ,['class'=>'form-control select2','placeholder'=>trans('admin.brand_id')]) !!}
		</div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
		<div class="form-group">
				{!! Form::label('category_id',trans('admin.category_id'),['class'=>'control-label']) !!}
{!! Form::select('category_id',App\Models\Category::pluck('category_name','id'), $flashe->category_id ,['class'=>'form-control select2','placeholder'=>trans('admin.category_id')]) !!}
		</div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('model',trans('admin.model'),['class'=>'control-label']) !!}
        {!! Form::text('model', $flashe->model ,['class'=>'form-control','placeholder'=>trans('admin.model')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('model_name',trans('admin.model_name'),['class'=>'control-label']) !!}
        {!! Form::text('model_name', $flashe->model_name ,['class'=>'form-control','placeholder'=>trans('admin.model_name')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('region',trans('admin.region'),['class'=>'control-label']) !!}
        {!! Form::text('region', $flashe->region ,['class'=>'form-control','placeholder'=>trans('admin.region')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('security_level',trans('admin.security_level'),['class'=>'control-label']) !!}
        {!! Form::text('security_level', $flashe->security_level ,['class'=>'form-control','placeholder'=>trans('admin.security_level')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('security_date',trans('admin.security_date'),['class'=>'control-label']) !!}
        {!! Form::text('security_date', $flashe->security_date ,['class'=>'form-control','placeholder'=>trans('admin.security_date')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
		<div class="form-group">
				{!! Form::label('version_id',trans('admin.version_id'),['class'=>'control-label']) !!}
{!! Form::select('version_id',App\Models\Version::pluck('version','id'), $flashe->version_id ,['class'=>'form-control select2','placeholder'=>trans('admin.version_id')]) !!}
		</div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('build date',trans('admin.build date'),['class'=>'control-label']) !!}
        {!! Form::text('build date', $flashe->build date ,['class'=>'form-control','placeholder'=>trans('admin.build date')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('status',trans('admin.status'),['class'=>'control-label']) !!}
        {!! Form::text('status', $flashe->status ,['class'=>'form-control','placeholder'=>trans('admin.status')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('url1',trans('admin.url1'),['class'=>'control-label']) !!}
        {!! Form::text('url1', $flashe->url1 ,['class'=>'form-control','placeholder'=>trans('admin.url1')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('url2',trans('admin.url2'),['class'=>'control-label']) !!}
        {!! Form::text('url2', $flashe->url2 ,['class'=>'form-control','placeholder'=>trans('admin.url2')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('url3',trans('admin.url3'),['class'=>'control-label']) !!}
        {!! Form::text('url3', $flashe->url3 ,['class'=>'form-control','placeholder'=>trans('admin.url3')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('views',trans('admin.views'),['class'=>'control-label']) !!}
        {!! Form::text('views', $flashe->views ,['class'=>'form-control','placeholder'=>trans('admin.views')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('info',trans('admin.info'),['class'=>'control-label']) !!}
        {!! Form::textarea('info', $flashe->info ,['class'=>'form-control ckeditor','placeholder'=>trans('admin.info')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('tags',trans('admin.tags'),['class'=>'control-label']) !!}
        {!! Form::text('tags', $flashe->tags ,['class'=>'form-control','placeholder'=>trans('admin.tags')]) !!}
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
    "type"=>"edit",
    "id"=>$flashe->id,
    "route"=>"flashe",
    "path"=>"flashe/".$flashe->id,
    ])
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('root_mode',trans('admin.root_mode'),['class'=>'control-label']) !!}
        {!! Form::text('root_mode', $flashe->root_mode ,['class'=>'form-control','placeholder'=>trans('admin.root_mode')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('key_id',trans('admin.key_id'),['class'=>'control-label']) !!}
        {!! Form::text('key_id', $flashe->key_id ,['class'=>'form-control','placeholder'=>trans('admin.key_id')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('imei',trans('admin.imei'),['class'=>'control-label']) !!}
        {!! Form::text('imei', $flashe->imei ,['class'=>'form-control','placeholder'=>trans('admin.imei')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('baseband',trans('admin.baseband'),['class'=>'control-label']) !!}
        {!! Form::text('baseband', $flashe->baseband ,['class'=>'form-control','placeholder'=>trans('admin.baseband')]) !!}
    </div>
</div>

</div>
		<!-- /.row -->
		</div>
	<!-- /.card-body -->
	<div class="card-footer"><button type="submit" name="save" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> {{ trans('admin.save') }}</button>
<button type="submit" name="save_back" class="btn btn-success btn-flat"><i class="fa fa-save"></i> {{ trans('admin.save_back') }}</button>
{!! Form::close() !!}
</div>
</div>
@endsection