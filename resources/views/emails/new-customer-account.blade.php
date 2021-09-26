<?php $data = get_emails_option_data();
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
  <div marginheight="0" marginwidth="0" wi>
    <div style="background-color:#{!! $data['new_customer_account']['body_bg_color'] !!};margin:0;padding:70px 0 70px 0;width:100%" dir="ltr">
        <div style="padding:15px 0px; text-align:center; box-shadow:0px 0px 5px #000000 ;" >
            <img   src="{{ get_site_logo_image() }}">
        </div>
      <div style="color:#ffffff; font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif; font-size:30px; font-weight:300; line-height:150%; margin:0; text-align:center;padding:10px 0px;"></div>
      <p>{!! trans('admin.new_account_mail_notice') !!}</p>
    
      <!--<p>Please follow this link to confirm your account <a style="padding:5px 8px ; display:inline-block; background:#B81D22;color:#ffffff;" href="{{ route('user-verify-account-page',$_unique_code) }}"> Confirm account</a></p>-->
    </div>
  </div>
</body>
</html>