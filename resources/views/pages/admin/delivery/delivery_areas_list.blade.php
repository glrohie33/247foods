@extends('layouts.admin.master')
@section('title', trans('Delivery Settings') .' < '. get_site_title())

@section('content')
<div class="row">
  <div class="col-6">
    <h5>{!! trans('Delivery Areas') !!}</h5>
  </div>
  <div class="col-6">
    <div class="pull-right">
      <a href="{{ route('admin.add_delivery_area_content') }}" class="btn btn-primary pull-right btn-sm">{{ trans('add new zone') }}</a>
    </div>  
  </div>
</div>
<br>
<div class="row">
  <div class="col-12">
    <div class="box">
      <div class="box-body">
        <div id="table_search_option">
          <form action="{{ route('admin.users_list') }}" method="GET"> 
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="input-group">
                  <input type="text" name="term_user_name" class="search-query form-control" placeholder="Enter user name to search" value="{{ $search_value }}" />
                  <div class="input-group-btn">
                    <button class="btn btn-primary" type="submit">
                      <span class="fa fa-search"></span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </form>  
        </div>      
        <table class="table table-bordered admin-data-table admin-data-list table-responsive">
          <thead class="thead-dark">
            <tr>
              <th>Index</th>
              <th>Zone Name</th>
              <th>Zone Areas</th>
              <th>Same Day</th>
              <th>Weekends</th>
              <th>min_days</th>
              <th>start hour</th>
              <th>end our</th>
              <th>Action</th>            

            </tr>
          </thead>
          <tbody>
              <?php $i=1; ?>
            @if(count($delivery_areas)>0)
            @foreach($delivery_areas as $row)
            <tr>
                <td>{{ $i }}</td>
              <td>{!! $row['delivery_zone'] !!}</td>
              
              <td><p style="max-width: 200px; min-width:150px;word-break: break-word;">{!! $row['zone_areas'] !!}</p></td>
              
              <td>{!! $row['sameday_delivery'] !!}</td>
              
              <td>{!! $row['weekend_delivery'] !!}</td>
              <td>{!! $row['min_days'] !!}</td>
              <td>{!! $row['start_hour'] !!}</td>
              <td>{!! $row['end_hour'] !!}</td>
              <td>
                <div class="btn-group">
                  <button class="btn btn-success btn-flat" type="button">{{ trans('Action') }}</button>
                  <button data-toggle="dropdown" class="btn btn-success btn-flat dropdown-toggle" type="button">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul role="menu" class="dropdown-menu">
                    <li><a href=" {{ URL::to('/admin/delivery_area/edit',$row['id']) }}"><i class="fa fa-edit"></i>{{ trans('Edit') }}</a></li>
                    <li><a href=" {{ URL::to('/admin/delivery_area/delete',$row['id']) }}" class=""  ><i class="fa fa-remove"></i>{{ trans('delete') }}</a></li>
                    
                  </ul>
                </div>
              </td>
            </tr>
            <?php $i++?>
            @endforeach
            @endif
          </tbody>
          <tfoot class="thead-dark">
            <tr>
                    <th>Index</th>
                    <th>Zone Name</th>
                    <th>Zone Areas</th>
                    <th>Same Day</th>
                    <th>Weekends</th>
                    <th>min_days</th>
                    <th>start hour</th>
                    <th>end our</th>
                    <th>Action</th>            

            </tr>
          </tfoot>
        </table>
          <br>  
        {{-- <div class="products-pagination">{!! $delivery_areas->appends(Request::capture()->except('page'))->render() !!}</div>   --}}
      </div>
    </div>
  </div>
</div>
<div class="eb-overlay"></div>
<div class="eb-overlay-loader"></div>

@include('includes.csrf-token')
@endsection