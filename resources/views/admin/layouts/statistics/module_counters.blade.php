<!--admingroups_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{ App\Models\AdminGroup::count() }}</h3>
        <p>{{ trans('admin.admingroups') }}</p>
      </div>
      <div class="icon">
        <i class="fas fa-users"></i>
      </div>
      <a href="{{ aurl('admingroups') }}" class="small-box-footer">{{ trans('admin.admingroups') }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
<!--admingroups_end-->
<!--admins_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{ App\Models\Admin::count() }}</h3>
        <p>{{ trans('admin.admins') }}</p>
      </div>
      <div class="icon">
        <i class="fas fa-users"></i>
      </div>
      <a href="{{ aurl('admins') }}" class="small-box-footer">{{ trans('admin.admins') }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
<!--admins_end-->

<!--brands_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\Brand::count()) }}</h3>
        <p>{{ trans("admin.brands") }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-bookmark"></i>
      </div>
      <a href="{{ aurl("brands") }}" class="small-box-footer">{{ trans("admin.brands") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--brands_end-->
<!--catergory_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\Category::count()) }}</h3>
        <p>{{ trans("admin.catergory") }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-window-restore"></i>
      </div>
      <a href="{{ aurl("catergory") }}" class="small-box-footer">{{ trans("admin.catergory") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--catergory_end-->
<!--version_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\Version::count()) }}</h3>
        <p>{{ trans("admin.version") }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-bacterium"></i>
      </div>
      <a href="{{ aurl("version") }}" class="small-box-footer">{{ trans("admin.version") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--version_end-->
<!--versions_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\Version::count()) }}</h3>
        <p>{{ trans("admin.versions") }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-bacterium"></i>
      </div>
      <a href="{{ aurl("versions") }}" class="small-box-footer">{{ trans("admin.versions") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--versions_end-->
<!--flashe_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\Rom::count()) }}</h3>
        <p>{{ trans("admin.flashe") }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-icons"></i>
      </div>
      <a href="{{ aurl("flashe") }}" class="small-box-footer">{{ trans("admin.flashe") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--flashe_end-->
<!--devices_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\Device::count()) }}</h3>
        <p>{{ trans("admin.devices") }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-icons"></i>
      </div>
      <a href="{{ aurl("devices") }}" class="small-box-footer">{{ trans("admin.devices") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--devices_end-->
<!--regions_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\Region::count()) }}</h3>
        <p>{{ trans("admin.regions") }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-icons"></i>
      </div>
      <a href="{{ aurl("regions") }}" class="small-box-footer">{{ trans("admin.regions") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--regions_end-->