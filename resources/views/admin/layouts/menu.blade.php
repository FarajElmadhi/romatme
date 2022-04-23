<!-- Add icons to the links using the .nav-icon class
with font-awesome or any other icon font library -->
<li class="nav-header"></li>
<li class="nav-item">
  <a href="{{ aurl('') }}" class="nav-link {{ active_link(null,'active') }}">
    <i class="nav-icon fas fa-home"></i>
    <p>
      {{ trans('admin.dashboard') }}
    </p>
  </a>
</li>
@if(admin()->user()->role('settings_show'))
<li class="nav-item">
  <a href="{{ aurl('settings') }}" class="nav-link  {{ active_link('settings','active') }}">
    <i class="nav-icon fas fa-cogs"></i>
    <p>
      {{ trans('admin.settings') }}
    </p>
  </a>
</li>
@endif
@if(admin()->user()->role("admins_show"))
<li class="nav-item {{ active_link('admins','menu-open') }}">
  <a href="#" class="nav-link  {{ active_link('admins','active') }}">
    <i class="nav-icon fas fa-users"></i>
    <p>
      {{trans('admin.admins')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('admins')}}" class="nav-link {{ active_link('admins','active') }}">
        <i class="fas fa-users nav-icon"></i>
        <p>{{trans('admin.admins')}}</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('admins/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}}</p>
      </a>
    </li>
  </ul>
</li>
@endif
@if(admin()->user()->role("admingroups_show"))
<li class="nav-item {{ active_link('admingroups','menu-open') }}">
  <a href="#" class="nav-link  {{ active_link('admingroups','active') }}">
    <i class="nav-icon fas fa-users"></i>
    <p>
      {{trans('admin.admingroups')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('admingroups')}}" class="nav-link {{ active_link('admingroups','active') }}">
        <i class="fas fa-users nav-icon"></i>
        <p>{{trans('admin.admingroups')}}</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('admingroups/create') }}" class="nav-link ">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}}</p>
      </a>
    </li>
  </ul>
</li>
@endif
<!--brands_start_route-->
@if(admin()->user()->role("brands_show"))
<li class="nav-item {{active_link('brands','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('brands','active')}}">
    <i class="nav-icon fa fa-bookmark"></i>
    <p>
      {{trans('admin.brands')}} 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('brands')}}" class="nav-link  {{active_link('brands','active')}}">
        <i class="fa fa-bookmark nav-icon"></i>
        <p>{{trans('admin.brands')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('brands/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif
<!--brands_end_route-->

<!--catergory_start_route-->
@if(admin()->user()->role("catergory_show"))
<li class="nav-item {{active_link('catergory','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('catergory','active')}}">
    <i class="nav-icon fa fa-window-restore"></i>
    <p>
      {{trans('admin.catergory')}} 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('catergory')}}" class="nav-link  {{active_link('catergory','active')}}">
        <i class="fa fa-window-restore nav-icon"></i>
        <p>{{trans('admin.catergory')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('catergory/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif
<!--catergory_end_route-->



<!--versions_start_route-->
@if(admin()->user()->role("versions_show"))
<li class="nav-item {{active_link('versions','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('versions','active')}}">
    <i class="nav-icon fa fa-bacterium"></i>
    <p>
      {{trans('admin.versions')}} 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('versions')}}" class="nav-link  {{active_link('versions','active')}}">
        <i class="fa fa-bacterium nav-icon"></i>
        <p>{{trans('admin.versions')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('versions/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif
<!--versions_end_route-->

<!--flashe_start_route-->
@if(admin()->user()->role("flashe_show"))
<li class="nav-item {{active_link('flashe','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('flashe','active')}}">
    <i class="nav-icon fa fa-icons"></i>
    <p>
      {{trans('admin.flashe')}} 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('flashe')}}" class="nav-link  {{active_link('flashe','active')}}">
        <i class="fa fa-icons nav-icon"></i>
        <p>{{trans('admin.flashe')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('flashe/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif
<!--flashe_end_route-->

<!--rom_start_route-->
@if(admin()->user()->role("rom_show"))
<li class="nav-item {{active_link('rom','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('rom','active')}}">
    <i class="nav-icon fa fa-icons"></i>
    <p>
      {{trans('admin.rom')}} 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('rom')}}" class="nav-link  {{active_link('rom','active')}}">
        <i class="fa fa-icons nav-icon"></i>
        <p>{{trans('admin.rom')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('rom/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif
<!--rom_end_route-->

<!--devices_start_route-->
@if(admin()->user()->role("devices_show"))
<li class="nav-item {{active_link('devices','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('devices','active')}}">
    <i class="nav-icon fa fa-icons"></i>
    <p>
      {{trans('admin.devices')}} 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('devices')}}" class="nav-link  {{active_link('devices','active')}}">
        <i class="fa fa-icons nav-icon"></i>
        <p>{{trans('admin.devices')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('devices/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif
<!--devices_end_route-->

<!--regions_start_route-->
@if(admin()->user()->role("regions_show"))
<li class="nav-item {{active_link('regions','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('regions','active')}}">
    <i class="nav-icon fa fa-icons"></i>
    <p>
      {{trans('admin.regions')}} 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('regions')}}" class="nav-link  {{active_link('regions','active')}}">
        <i class="fa fa-icons nav-icon"></i>
        <p>{{trans('admin.regions')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('regions/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif
<!--regions_end_route-->
