@extends('layouts.admin.master')
@section('title', trans('Delivery Settings') .' < '. get_site_title())

@section('content')
<div class="row">
  <div class="col-6">
    <h5>{!! trans('Add Delivery Area') !!}</h5>
  </div>
  <div class="col-6">
      <div class="pull-right">
        <a href="{{ route('admin.delivery_areas_content') }}" class="btn btn-primary pull-right btn-sm">{{ trans('Delivery Zone List') }}</a>
      </div>  
  </div>
</div>
<br>
<div class="row">
  <div class="col-12">
    <div class="box">
      <div class="box-body">
        <div id="">
          <form action="" method="Post" id="addDelivery"> 
            @include('includes.csrf-token')

            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-10 col-lg-8" style="margin:0px auto; max-width:600px;padding:20px 0px;">
                <div class="form-group">
                  <label for="zone_name">Zone Name</label>
                  <input type="text" id="zone_name" name="zone_name" class="search-query form-control" placeholder="Zone Name" value="{{ $search_value }}" />
                </div>

                <div class="form-group">
                  <label for="zone_areas">Zone Areas</label>
                  <textarea name="zone_areas" id="zone_areas" cols="30" rows="5" class="form-control" ></textarea>
                  <i><b>Note: </b>Please seperate each area by comma</i>
                </div>

                <div class="form-group">
                  <label for="same_day">Same Day Delivery</label>
                  <select name="same_day" id="same_day" class="form-control">
                    <option value="yes">Yes</option>
                    <option value="yes">No</option>
                  </select>
                </div>

                <div class="form-group">
                    <label for="weekend">Weekends Delivery</label>
                    <select name="weekend" id="weekend" class="form-control">
                      <option value="yes">Yes</option>
                      <option value="yes">No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Minimum Delivery Days</label>
                    <input type="text" name="min_days" class="form-control" placeholder="min_days" value="{{ $search_value }}" />
                </div>

                <div class="form-group">
                  <label>Delivery Open hour</label>
                  <input type="time" name="open_hour" class="form-control">
                </div>

                <div class="form-group">
                    <label>Delivery Closing hour</label>
                    <input type="time" name="close_hour" class="form-control">
                </div>
                <div class="form-group">
                  <input type="button" onclick="addDelivery()" class="btn btn-success" value="Add Zone">
                </div>
              </div>
            </div>
          </form>  
        </div>
        <div id="feedback" style="position: fixed;
        max-width: 500px;
        z-index: 99999;
        right: 15px;
        bottom: 35px;">
          </div>      
        
  </div>
</div>
<div class="eb-overlay"></div>
<div class="eb-overlay-loader"></div>
<script>
  function addDelivery(){
    var form = document.getElementById("addDelivery");
    var formData = new FormData(form);
    var ajax = new XMLHttpRequest();
    var url = '{{ URL::to("/admin/delivery-area/add") }}';
    ajax.onreadystatechange = function(){
      if(ajax.readyState == 4 && ajax.status == 200){
        var response = JSON.parse(ajax.responseText);
        if(response.status == true){
          form.reset();
          var feedback = `<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
              ${response.messages}</div>`;
          
              document.getElementById('feedback').innerHTML = feedback;
        }else{

          var errors= '';
          var error_messages = JSON.parse(response.messages);
          for(x in error_messages){
            var message = error_messages[x][0];
            errors += `<p>${message}</p>`;
          }

          var feedback = `<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
              ${errors}</div>`;
          
              document.getElementById('feedback').innerHTML = feedback;
        }

      }
    }

      ajax.open("POST",url,true);
      ajax.send(formData);

  }


</script>

@endsection