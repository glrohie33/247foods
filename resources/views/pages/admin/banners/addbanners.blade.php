@extends('layouts.admin.master')
@section('title', trans('admin.add_post_page_title') .' < '. get_site_title())

@section('content')
@include('pages-message.form-submit')
@include('pages-message.notify-msg-error')
@include('pages-message.notify-msg-success')

  <?php //die(var_dump($home_banner)) ?>
<form class="form-horizontal" method="post" action="" enctype="multipart/form-data" id="addbanner">
  @include('includes.csrf-token')
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">{!! trans('admin.add_new_post_top_title') !!} &nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-default btn-sm" href="{{ route('admin.all_blogs') }}">{!! trans('admin.posts_list') !!}</a></h3>
      <div class="pull-right">
        <button class="btn btn-primary btn-sm" type="button" onclick="saveBanners()">{!! trans('admin.save') !!}</button>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-8">

      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-upload"></i>
          <h3 class="box-title"> Banner 1</h3>
          <div class="box-tools pull-right">
            <div data-toggle="modal" data-dropzone_id="dropzone_banner1_uploader" data-target="#banner1Uploader" class="icon product-uploader">{!! trans('admin.upload_image') !!}</div>
          </div>
        </div>
        <div class="box-body featured-img-content">
          <div class="uploaded-featured-image">
            <div class="banner1-sample-img"><img class="upload-icon img-responsive" src=""></div>
            <div class="banner1-uploaded-image" "><img class="img-responsive" src="<?=($home_banner[0]['image'])? URL::asset($home_banner[0]['image']) : "" ;?>" style="max-height:150px;><div class="remove-img-link"></div></div>
          </div>
          <div>
              <input type="text" name="banner1_url" value="<?=($home_banner[0]['url'])? $home_banner[0]['url'] : "" ;?>" placeholder="Place Url Here"  class="form-control">
          </div>
            <input type="text" hidden name="banner1" value="<?=($home_banner[0]['image'])? $home_banner[0]['image'] : "" ;?>" id="banner1_input" >     
          <div class="modal fade" id="banner1Uploader" tabindex="-1" role="dialog" aria-labelledby="updater" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <p class="no-margin">{!! trans('admin.you_can_upload_1_image') !!}</p>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>  
                <div class="modal-body">             
                  <div class="uploadform dropzone no-margin dz-clickable dropzone_banner1_upload" id="dropzone_banner1_upload" name="dropzone_banner1_upload">
                    <div class="dz-default dz-message">
                      <span>{!! trans('admin.drop_your_cover_picture_here') !!}</span>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default attachtopost" data-dismiss="modal">{!! trans('admin.close') !!}</button>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-upload"></i>
          <h3 class="box-title"> Banner 2</h3>
          <div class="box-tools pull-right">
            <div data-toggle="modal" data-dropzone_id="dropzone_banner2_uploader" data-target="#banner2Uploader" class="icon product-uploader">{!! trans('admin.upload_image') !!}</div>
          </div>
        </div>
        <div class="box-body featured-img-content">
          <div class="uploaded-featured-image">
            <div class="banner2-sample-img"><img class="upload-icon img-responsive" src=""></div>

            <div class="banner2-uploaded-image" "><img class="img-responsive" src="<?=($home_banner[1]['image'])? URL::asset($home_banner[1]['image']) : "" ;?>"  style="max-height:150px;><div class="remove-img-link"></div></div>
          </div>
          <div>
              <input type="text" name="banner2_url" value="<?=($home_banner[1]['url'])? $home_banner[1]['url'] : "" ;?>" class="form-control" placeholder="Place Url Here">
          </div>
            <input type="text" hidden name="banner2" value="<?=($home_banner[1]['image'])? $home_banner[1]['image'] : "" ;?>" id="banner2_input">     
          <div class="modal fade" id="banner2Uploader" tabindex="-1" role="dialog" aria-labelledby="updater" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <p class="no-margin">{!! trans('admin.you_can_upload_1_image') !!}</p>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>  
                <div class="modal-body">             
                  <div class="uploadform dropzone no-margin dz-clickable dropzone_banner2_upload" id="dropzone_banner2_upload" name="dropzone_banner2_upload">
                    <div class="dz-default dz-message">
                      <span>{!! trans('admin.drop_your_cover_picture_here') !!}</span>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default attachtopost" data-dismiss="modal">{!! trans('admin.close') !!}</button>
                </div>
              </div>
            </div>
          </div>
      </div>
      

      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-upload"></i>
          <h3 class="box-title"> Banner 3</h3>
          <div class="box-tools pull-right">
            <div data-toggle="modal" data-dropzone_id="dropzone_banner3_uploader" data-target="#banner3Uploader" class="icon product-uploader">{!! trans('admin.upload_image') !!}</div>
          </div>
        </div>
        <div class="box-body featured-img-content">
          <div class="uploaded-featured-image">
            <div class="banner3-sample-img"><img class="upload-icon img-responsive" src=""></div>
            <div class="banner3-uploaded-image" "><img class="img-responsive" src="<?=($home_banner[2]['image'])? URL::asset($home_banner[2]['image']) : "" ;?>"  style="max-height:150px;><div class="remove-img-link">></div></div>
          </div>
          <div>
              <input type="text" name="banner3_url" value="<?=($home_banner[2]['url'])? $home_banner[2]['url'] : "" ;?>" class="form-control"  placeholder="Place Url Here">
          </div>
            <input type="text" hidden name="banner3" value="<?=($home_banner[2]['image'])? $home_banner[2]['image'] : "" ;?>" id="banner3_input">     
          <div class="modal fade" id="banner3Uploader" tabindex="-1" role="dialog" aria-labelledby="updater" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <p class="no-margin">{!! trans('admin.you_can_upload_1_image') !!}</p>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>  
                <div class="modal-body">             
                  <div class="uploadform dropzone no-margin dz-clickable dropzone_banner3_upload" id="dropzone_banner3_upload" name="dropzone_banner3_upload">
                    <div class="dz-default dz-message">
                      <span>{!! trans('admin.drop_your_cover_picture_here') !!}</span>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default attachtopost" data-dismiss="modal">{!! trans('admin.close') !!}</button>
                </div>
              </div>
            </div>
          </div>
      </div>
     

      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-upload"></i>
          <h3 class="box-title"> Banner 4</h3>
          <div class="box-tools pull-right">
            <div data-toggle="modal" data-dropzone_id="dropzone_banner4_uploader" data-target="#banner4Uploader" class="icon product-uploader">{!! trans('admin.upload_image') !!}</div>
          </div>
        </div>
        <div class="box-body featured-img-content">
          <div class="uploaded-featured-image">
            <div class="banner4-sample-img"><img class="upload-icon img-responsive" src=""></div>
            <div class="banner4-uploaded-image" "><img class="img-responsive" src="<?=(!empty($home_banner[3]['image']))? URL::asset($home_banner[3]['image']) : "" ;?>" style="max-height:150px;><div class="remove-img-link"></div></div>
          </div>
          <div>
              <input type="text" name="banner4_url" value="<?=(!empty($home_banner[3]['url']))? $home_banner[3]['url'] : "" ;?>" class="form-control" placeholder="Place Url Here">
          </div>
            <input type="text" hidden name="banner4" value="<?=(!empty($home_banner[3]['image']))? $home_banner[3]['image'] : "" ;?>" id="banner4_input">     
          <div class="modal fade" id="banner4Uploader" tabindex="-1" role="dialog" aria-labelledby="updater" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <p class="no-margin">{!! trans('admin.you_can_upload_1_image') !!}</p>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>  
                <div class="modal-body">             
                  <div class="uploadform dropzone no-margin dz-clickable dropzone_banner4_upload" id="dropzone_banner4_upload" name="dropzone_banner4_upload">
                    <div class="dz-default dz-message">
                      <span>{!! trans('admin.drop_your_cover_picture_here') !!}</span>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default attachtopost" data-dismiss="modal">{!! trans('admin.close') !!}</button>
                </div>
              </div>
            </div>
          </div>
      </div>
     

      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-upload"></i>
          <h3 class="box-title"> Banner 5</h3>
          <div class="box-tools pull-right">
            <div data-toggle="modal" data-dropzone_id="dropzone_banner5_uploader" data-target="#banner5Uploader" class="icon product-uploader">{!! trans('admin.upload_image') !!}</div>
          </div>
        </div>
        <div class="box-body featured-img-content">
          <div class="uploaded-featured-image">
            <div class="banner5-sample-img"><img class="upload-icon img-responsive" src=""></div>
            <div class="banner5-uploaded-image" "><img class="img-responsive" src="<?=($home_banner[4]['image'])? URL::asset($home_banner[4]['image']) : "" ;?>"  style="max-height:150px;><div class="remove-img-link"></div></div>
          </div>
          <div>
              <input type="text" name="banner5_url" value="<?=($home_banner[4]['url'])? $home_banner[4]['url'] : "" ;?>" class="form-control" placeholder="Place Url Here">
          </div>
            <input type="text" hidden name="banner5" id="banner5_input" value="<?=($home_banner[4]['image'])? $home_banner[4]['image'] : "" ;?>">     
          <div class="modal fade" id="banner5Uploader" tabindex="-1" role="dialog" aria-labelledby="updater" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <p class="no-margin">{!! trans('admin.you_can_upload_1_image') !!}</p>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>  
                <div class="modal-body">             
                  <div class="uploadform dropzone no-margin dz-clickable dropzone_banner5_upload" id="dropzone_banner5_upload" name="dropzone_banner5_upload">
                    <div class="dz-default dz-message">
                      <span>{!! trans('admin.drop_your_cover_picture_here') !!}</span>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default attachtopost" data-dismiss="modal">{!! trans('admin.close') !!}</button>
                </div>
              </div>
            </div>
          </div>
      </div>
      

      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-upload"></i>
          <h3 class="box-title"> Banner 6</h3>
          <div class="box-tools pull-right">
            <div data-toggle="modal" data-dropzone_id="dropzone_banner6_uploader" data-target="#banner6Uploader" class="icon product-uploader">{!! trans('admin.upload_image') !!}</div>
          </div>
        </div>
        <div class="box-body featured-img-content">
          <div class="uploaded-featured-image">
            <div class="banner6-sample-img"><img class="upload-icon img-responsive" src=""></div>
            <div class="banner6-uploaded-image" "><img class="img-responsive"  src="<?=($home_banner[5]['image'])? URL::asset($home_banner[5]['image']) : "" ;?>" style="max-height:150px;><div class="remove-img-link"></div></div>
          </div>
          <div>
              <input type="text" name="banner6_url" value="<?=($home_banner[5]['url'])? $home_banner[5]['url'] : "" ;?>" class="form-control" placeholder="Place Url Here">
          </div>
            <input type="text" hidden name="banner6" id="banner6_input" value="<?=($home_banner[5]['image'])? $home_banner[5]['image'] : "" ;?>">     
          <div class="modal fade" id="banner6Uploader" tabindex="-1" role="dialog" aria-labelledby="updater" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <p class="no-margin">{!! trans('admin.you_can_upload_1_image') !!}</p>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>  
                <div class="modal-body">             
                  <div class="uploadform dropzone no-margin dz-clickable dropzone_banner6_upload" id="dropzone_banner6_upload" name="dropzone_banner6_upload">
                    <div class="dz-default dz-message">
                      <span>{!! trans('admin.drop_your_cover_picture_here') !!}</span>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default attachtopost" data-dismiss="modal">{!! trans('admin.close') !!}</button>
                </div>
              </div>
            </div>
          </div>
      </div>
      

      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-upload"></i>
          <h3 class="box-title"> Banner 7</h3>
          <div class="box-tools pull-right">
            <div data-toggle="modal" data-dropzone_id="dropzone_banner7_uploader" data-target="#banner7Uploader" class="icon product-uploader">{!! trans('admin.upload_image') !!}</div>
          </div>
        </div>
        <div class="box-body featured-img-content">
          <div class="uploaded-featured-image">
            <div class="banner7-sample-img"><img class="upload-icon img-responsive" src=""></div>
            <div class="banner7-uploaded-image" "><img class="img-responsive" src="<?=($home_banner[6]['image'])? URL::asset($home_banner[6]['image']) : "" ;?>"  style="max-height:150px;><div class="remove-img-link"></div></div>
          </div>
          <div>
              <input type="text" name="banner7_url" class="form-control" value="<?=($home_banner[6]['url'])? $home_banner[6]['url'] : "" ;?>" placeholder="Place Url Here">
          </div>
            <input type="text" hidden name="banner7" id="banner7_input" value="<?=($home_banner[6]['image'])? $home_banner[6]['image'] : "" ;?>">     
          <div class="modal fade" id="banner7Uploader" tabindex="-1" role="dialog" aria-labelledby="updater" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <p class="no-margin">{!! trans('admin.you_can_upload_1_image') !!}</p>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>  
                <div class="modal-body">             
                  <div class="uploadform dropzone no-margin dz-clickable dropzone_banner7_upload" id="dropzone_banner7_upload" name="dropzone_banner7_upload">
                    <div class="dz-default dz-message">
                      <span>{!! trans('admin.drop_your_cover_picture_here') !!}</span>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default attachtopost" data-dismiss="modal">{!! trans('admin.close') !!}</button>
                </div>
              </div>
            </div>
          </div>
      </div>
      

      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-upload"></i>
          <h3 class="box-title"> Banner 8</h3>
          <div class="box-tools pull-right">
            <div data-toggle="modal" data-dropzone_id="dropzone_banner8_uploader" data-target="#banner8Uploader" class="icon product-uploader">{!! trans('admin.upload_image') !!}</div>
          </div>
        </div>
        <div class="box-body featured-img-content">
          <div class="uploaded-featured-image">
            <div class="banner8-sample-img"><img class="upload-icon img-responsive" src=""></div>
            <div class="banner8-uploaded-image" "><img class="img-responsive" src="<?=($home_banner[7]['image'])? URL::asset($home_banner[7]['image']) : "" ;?>" style="max-height:150px;><div class="remove-img-link"></div></div>
          </div>
          <div>
              <input type="text" name="banner8_url" class="form-control" value="<?=($home_banner[7]['url'])? $home_banner[7]['url'] : "" ;?>" placeholder="Place Url Here">
          </div>
            <input type="text" hidden name="banner8" id="banner8_input" value="<?=($home_banner[7]['image'])? $home_banner[7]['image'] : "" ;?>" >     
          <div class="modal fade" id="banner8Uploader" tabindex="-1" role="dialog" aria-labelledby="updater" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <p class="no-margin">{!! trans('admin.you_can_upload_1_image') !!}</p>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>  
                <div class="modal-body">             
                  <div class="uploadform dropzone no-margin dz-clickable dropzone_banner8_upload" id="dropzone_banner8_upload" name="dropzone_banner8_upload">
                    <div class="dz-default dz-message">
                      <span>{!! trans('admin.drop_your_cover_picture_here') !!}</span>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default attachtopost" data-dismiss="modal">{!! trans('admin.close') !!}</button>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>


     
      

    </div>

  </div>
  <input type="hidden" name="hf_post_type" id="hf_post_type" value="add">
  <input type="hidden" name="image_url" id="image_url">
</form>
<script>
    function saveBanners(){
        var form = document.getElementById("addbanner");
        var formdata = new FormData(form);
        var xml = new XMLHttpRequest();
        xml.onreadystatechange = function (){
            if(xml.readyState == 4 && xml.status == 200){
                var response  = xml.responseText;
                window.alert(response);
            }
        }

        var url = "{{  URL::to("/admin/banners/save") }}"
        xml.open("POST",url,true);
        xml.send(formdata);
    }
</script>
@endsection