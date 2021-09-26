<div class="user-dashboard-notice">
  <h4 style="text-transform:capitalize;">{{ trans('frontend.hi_single_label') }} {{ $login_user_details['user_display_name'] }}</h4>
  {{-- <p>{{ trans('frontend.user_db_notice_label') }}</p> --}}
</div>



<div class="row">
    <div class="col-md-12 small-box bg-gray" style="padding:10px 0px;  ">
      <div class="row">
        <div class="col-md-12" id="feedback"></div>
        <div class="col-md-12 ">
          <div class="row">
              <div class="col-md-2">
                  <p style="text-align:right; margin:0.5rem 0; font-weight:bold;">Refferal Link :</p>
                </div>
                <div class="col-md-8">
                  <input type="text" readonly value="{{ URL::to($ref_link) }}" onclick="copyLink(this)" class="form-control form-control-sm">
                </div>
          </div>
        </div>
      </div>
    </div>
  <div class="col-lg-4 col-xs-12">
    <div class="small-box bg-gray">
      <div class="inner">
        <h3>{!! $dashboard_data['todays_order'] !!}</h3>
        <p>{{ trans('frontend.user_account_todays_order_label') }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-area-chart"></i>
      </div>
      <a href="{{ route('my-orders-page') }}" class="small-box-footer">{{ trans('frontend.user_account_more_info_label') }} <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-4 col-xs-12">
    <div class="small-box bg-gray">
      <div class="inner">
        <h3>{!! $dashboard_data['total_order'] !!}</h3>
        <p>{{ trans('frontend.user_account_totals_order_label') }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-area-chart"></i>
      </div>
      <a href="{{ route('my-orders-page') }}" class="small-box-footer">{{ trans('frontend.user_account_more_info_label') }} <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-4 col-xs-12">
    <div class="small-box bg-gray">
      <div class="inner">
        <h3>{!! $dashboard_data['recent_coupon'] !!}</h3>
        <p>{{ trans('frontend.user_account_recent_coupon_label') }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-percent"></i>
      </div>
      <a href="{{ route('my-coupons-page') }}" class="small-box-footer">{{ trans('frontend.user_account_more_info_label') }} <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
</div>
<script>
  function copyLink(ele){
    var copyText = ele;
    copyText.select();
    copyText.setSelectionRange(0,99999);
    document.execCommand("copy",true);
    document.getElementById("feedback").innerHTML = `<div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Success!</strong> your refferal link has been copied.
              </div>`;
  }
</script>