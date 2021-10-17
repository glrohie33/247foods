<script>
    var jsonzones = '<?= ($delivery_areas)? json_encode($delivery_areas): ""?>';

    var zones = JSON.parse(jsonzones);
    var zone = null;
    var timeValid = false;
    var dateValid = false;
    function setUsersArea(ele){
        
            var time = document.getElementById('user_delivery_time');
            var date = document.getElementById('user_delivery_date');
            var guestAreas = document.getElementById('user_delivery_areas');

            if(ele.value.length > 0){
            zone = zones.find( (zone) =>{return zone.delivery_zone === ele.value});
            var areas = zone['zone_areas'];
            var arrayareas = areas.split(",");
            var areaoptions = "";
            var i = 0;
            while(i < arrayareas.length){
                areaoptions += `<option>${arrayareas[i]}</option>`;
                i++;
            }
                guestAreas.innerHTML = areaoptions;
                if(zone['sameday_delivery'] == 'yes'){
                var min_date = new Date().toLocaleDateString("sv-SE");
                date.min =  min_date;
                }
                
                if(zone['min_days']>0){
                var days = 1000 * 60 * 60 * 24;
                var time = Date.now() + (days * zone['min_days']);
                var min_date = new Date(time).toLocaleDateString("sv-SE");
                date.min = min_date;
                }
                time.min = zone['start_hour'];
                time.max = zone['end_hour'];
            }else{
            guestAreas.innerHTML = "";
            time.min = "";
            time.max = "";
            }
        }

        

        function isTimeValid(ele,user=''){
            var time = ele.value
            var date = document.querySelector("input[name='delivery_date']").value;
            timeValid = true;
            var error = "";
            
            if(user == "user"){
            var visible = document.querySelector(` #time_hint`);
            }else{
            var visible = document.querySelector(`#time_hint`);
            }
            
            visible.innerHTML = "";
            if(zone != null){
            if(time < zone.start_hour || time > zone.end_hour){
                timeValid = false;
                error += `time is invalid select within ${zone.start_hour} to  ${zone.end_hour} <br>`;
            }
            var selected_time = new Date(`${date}T${time}Z`).getTime();
            var now = new Date().getTime();
            var time_diff = selected_time - now;
            var aday = 1000 * 60 * 60 * 24;
            
            if(time_diff < aday){    
                timeValid = false;
                error += `we can only deliver 24 hours after you make your order <br> `;
            }
            
            console.log(timeValid);
            visible.innerHTML = error;
            }
        }

        function isDateValid(ele,user=''){
            var setValidity = true;
            var date = new Date(ele.value);
            var error = "";
            if(user == "user"){
            var visible = document.querySelector(` #date_hint`);
            }else{
            var visible = document.querySelector(` #date_hint`);
            }
            if(zone != null){
            if(zone.weekend_delivery == 'no'){
                if(date.getDay() == 0 || date.getDay() == 6){
                setValidity = false;
                error +="no weekend delivery for this zone <br>";
                }
            }

            if(zone.sameday_delivery == 'no'){
                var now = new Date(Date.now).toLocaleDateString("sv-SE");
                if(date < now){
                    setValidity = false;
                error +="no same day delivery for this zone please pick another day <br>";

                }
            }
            
            console.log(zone.min_days);
            
            if(zone.min_days > 0){
                var days = 1000 * 60 * 60 * 24;
                var time = Date.now() + (days * zone['min_days']);
                var min_date = new Date(time).toLocaleDateString("sv-SE");
                if(date < min_date){
                    setValidity = false;
                error +=`your date is invalid please select a later date starting from ${min_date} <br>`;
                }
            }
            
            if(date.getDay() == 0){
                setValidity = false;
                error +=`Opps Sorry we only make deliver from Mondays - Saturdays <br>`;
            }
            visible.innerHTML = error;
            dateValid = setValidity;
            }

        }
</script>

<script>
										
    var input = $("#address_form input[required]");
    var checkout = $("#so-checkout-confirm-button");

    function inputvalidate(){
        
                var status = true;
                for(var i = 0; i < input.length; i++){
                    if(input[i].value.length < 1){
                        var inputname = (input[i].placeholder)?input[i].placeholder+' ':'';
                        var text = document.createTextNode(inputname+ 'this field is required');
                        input[i].parentNode.insertBefore(text, input[i]);
                        input[i].style.border = "1px solid red";
                        status = false;
                    }
                    
                }
                if(status == false){
                        
                    input[0].scrollIntoView(true);
                }
                console.log(status);
                return status;
            }

            function verifyDelivery(userMode = '')
                    {
                    if (userMode == 'user')
                    {
                        var delivery_zone = $(`#user_delivery_zone`).val();
                        var delivery_area = $(`#user_delivery_areas`).val();
                        var delivery_date = $(`#user_delivery_date`).val();
                        var delivery_time = $(`#user_delivery_time`).val();
                    } else
                    {
                        var delivery_zone = $(`#delivery_zone`).val();
                        var delivery_area = $(`#delivery_areas`).val();
                        var delivery_date = $(`#delivery_date`).val();
                        var delivery_time = $(`#delivery_time`).val();
                    }

                    if (delivery_zone.length > 0 && delivery_area.length > 0 && delivery_date.length > 0 && delivery_time.length > 0)
                    {
                        if (timeValid == false || dateValid  == false)
                        {
                            delivery_error_message = "";
                        var ele = document.querySelector(".cart-data");
                        ele.innerHTML = delivery_error_message;
                        return true;
                        } else
                        {
                        return true;
                        }
                    } else
                    {
                        delivery_error_message = "<div class='alert alert-danger alert-dismissible ' style='max-width:400px;' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>please fill in your delivery form appropriately</div>";
                        var ele = document.querySelector(".cart-data");
                        ele.innerHTML = delivery_error_message;
                        return false;
                    }

                }
                function cartTotal()
                    {
                        var http = new XMLHttpRequest();
                        var total = 0;
                        var url = $('#hf_base_url').val() + "/ajax/cart-total";

                        http.onreadystatechange = function ()
                        {
                        if (http.readyState == 4 && http.status == 200)
                        {
                            var ret = JSON.parse(http.responseText);
                            if (ret.status == true)
                            {
                            total = ret.amount;
                            }
                        }
                        }
                        http.open('GET', url, false);
                        http.send();
                        return total;
                    }

                function payWithPaystack()
                        {
                            var ref = Date.now();
                            var email = $("#account_bill_email_address").val();
                            var phone_number = $("#account_bill_phone_number").val();
                            var first_name = $("#account_bill_first_name").val();
                            var last_name = $("#account_bill_last_name").val();
                            var amount = cartTotal();
                            var handler = PaystackPop.setup({
                            key: 'pk_live_dd1dc04552505bf098c8e484095f674ef9f19635', // Replace with your public key
                            email: email,
                            amount: amount * 100, // the amount value is multiplied by 100 to convert to the lowest currency unit
                            currency: 'NGN', // Use GHS for Ghana Cedis or USD for US Dollars
                            firstname: first_name,
                            lastname: last_name,
                            reference: ref, // Replace with a reference you generated
                            callback: function (response)
                            {
                                //this happens after the payment is completed successfully

                                var reference = response.reference;
                                $('#paystack_ref_code').val(reference);
                                $("#proceed").val("checkout_proceed");
                                alert('Congratulations your payment was successful');
                                var form = $('#checkout_form');
                                form.submit();
                                // Make an AJAX call to your server with the reference to verify the transaction
                            },
                            onClose: function ()
                            {

                                alert('Transaction was not completed, window closed.');
                            }
                            });

                            handler.openIframe();
                        }
                    
                    var button = $("#so-checkout-confirm-button").click(function(e){
                        e.preventDefault();
                        var val = inputvalidate();
                        if(val == true){
                            var form = $('#checkout_form');
                            
                                if(verifyDelivery("user") == true){
                                    $("#proceed").val("checkout_proceed");
                                    form.submit();
                                // 	var payment = $(" input[name='payment_option']:checked ").val();
                                // 	if(payment == "paystack"){
                                // 		payWithPaystack();
                                // 	}else if (payment == "cod"){
                                        
                                // 	}
                                // }else{

                                }
                        }
                    });
                    

</script>

<script>

    $("input[name='payment_option']").on('change',function(e){
        var item = e.target;
        if(item.value == "offline_transfer"){
            $("#acc_details").fadeIn(500);
        }else{
            $("#acc_details").fadeOut(1000);
        }
    });


    if ($('#apply_coupon_post').length > 0)
        {
          $('#apply_coupon_post').on('click', function (e)
          {
              
            e.preventDefault();
            if ($('#apply_coupon_code').val().length == 0 && $('#apply_coupon_code').val() == '')
            {
              $('#apply_coupon_code').css({ 'border': '1px solid #f06953' });
              return false
            }
            else
            {
              $('#apply_coupon_code').css({ 'border': '1px solid #cccccc' });
              applyCoupon($('#apply_coupon_code').val());
            }
          });
        }
        
        function applyCoupon(val)
        {
          var msgStr = '<div class="alert alert-danger" style="max-width:600px;"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><div class="message-header"><i class="fa fa-exclamation-triangle"></i>&nbsp;<strong>' + frontendLocalizationString.error_message_text + '</strong></div><p class="error-msg-coupon"></p></div>';
    
        //   $('.cart-total-area-overlay').show();
        //   $('#loader-1-cart').show();
    
          $.ajax({
            url: $('#hf_base_url').val() + '/ajax/applyCoupon',
            type: 'POST',
            cache: false,
            dataType: 'json',
            data: { _couponCode: val },
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function (data)
            {
                console.log(data);
              if ($('#cart_page, #checkout_page').find('.error-msg-coupon').length > 0)
              {
                $('#cart_page, #checkout_page').find('.error-msg-coupon').parents('.alert-danger').remove();
              }
    
              if (data.error == true && data.error_type == 'no_coupon_data')
              {
                $('#cart_page .cart-data, #checkout_page .cart-data').prepend(msgStr);
                $('#cart_page .cart-data, #checkout_page .cart-data').find('.error-msg-coupon').html(frontendLocalizationString.coupon_not_exists_msg);
              }
              else if (data.error == true && data.error_type == 'less_from_min_amount' && data.min_amount)
              {
                $('#cart_page .cart-data, #checkout_page .cart-data').prepend(msgStr);
                $('#cart_page .cart-data, #checkout_page .cart-data').find('.error-msg-coupon').html(frontendLocalizationString.coupon_min_spend_msg + ' ' + data.min_amount);
              }
              else if (data.error == true && data.error_type == 'exceed_from_max_amount' && data.max_amount)
              {
                $('#cart_page .cart-data, #checkout_page .cart-data').prepend(msgStr);
                $('#cart_page .cart-data, #checkout_page .cart-data').find('.error-msg-coupon').html(frontendLocalizationString.coupon_max_spend_msg + ' ' + data.max_amount);
              }
              else if (data.error == true && data.error_type == 'no_login')
              {
                $('#cart_page .cart-data, #checkout_page .cart-data').prepend(msgStr);
                $('#cart_page .cart-data, #checkout_page .cart-data').find('.error-msg-coupon').html(frontendLocalizationString.coupon_no_login_msg);
              }
              else if (data.error == true && data.error_type == 'user_role_not_match' && data.role_name)
              {
                $('#cart_page .cart-data, #checkout_page .cart-data').prepend(msgStr);
                $('#cart_page .cart-data, #checkout_page .cart-data').find('.error-msg-coupon').html(data.role_name + ' ' + frontendLocalizationString.coupon_no_login_msg);
              }
              else if (data.error == true && data.error_type == 'coupon_expired')
              {
                $('#cart_page .cart-data, #checkout_page .cart-data').prepend(msgStr);
                $('#cart_page .cart-data, #checkout_page .cart-data').find('.error-msg-coupon').html(frontendLocalizationString.coupon_expired_msg);
              }
              else if (data.error == true && data.error_type == 'coupon_already_apply')
              {
                $('#cart_page .cart-data, #checkout_page .cart-data').prepend(msgStr);
                $('#cart_page .cart-data, #checkout_page .cart-data').find('.error-msg-coupon').html(frontendLocalizationString.coupon_already_sxist_label);
              }
    
              else if (data.success == true && (data.success_type == 'discount_from_product' || data.success_type == 'percentage_discount_from_product' || data.success_type == 'percentage_discount_from_product' || data.success_type == 'discount_from_total_cart' || data.success_type == 'percentage_discount_from_total_cart' || data.success_type == 'percentage_discount_from_shipping'|| data.success_type == 'discount_from_shipping'))
              {
                 msgStr = '<div class="alert alert-success" style="max-width:600px;"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><div class="message-header"><i class="fa fa-exclamation-triangle"></i>&nbsp;<strong>' + frontendLocalizationString.error_message_text + '</strong></div><p class="error-msg-coupon"></p></div>';
                $('#cart_page .cart-data, #checkout_page .cart-data').prepend(msgStr);
                $('#cart_page .cart-data, #checkout_page .cart-data').find('.error-msg-coupon').html(frontendLocalizationString.coupon_added_msg);
                $('#cart_page .cart-grand-total, #checkout_page .cart-grand-total').before('<tr class="cart-coupon"><td class="text-right"><strong>' + frontendLocalizationString.coupon_label + '</strong></td><td class="value text-right"> - ' + data.discount_price + ' <a><button class="remove-coupon btn btn-default btn-xs" type="button">' + frontendLocalizationString.remove_coupon_label + '</button></a><p style="font-size:12px;"><i>'+data.success_type+'</i></p></td></tr>');
                $('#cart_page .cart-total-content .cart-grand-total .value, #checkout_page .cart-total-content .cart-grand-total .value').html(data.grand_total);
                   remove_user_coupon();
              }
              else if (data.error == true && data.error_type == 'exceed_from_cart_total')
              {
                $('#cart_page .cart-data, #checkout_page .cart-data').prepend(msgStr);
                $('#cart_page .cart-data, #checkout_page .cart-data').find('.error-msg-coupon').html(frontendLocalizationString.exceed_from_cart_total_msg);
              }
            },
            error: function () { }
          });
        }
        
    
        function remove_user_coupon()
        {
          if ($('.remove-coupon').length > 0)
          {
            $('.remove-coupon').on('click', function (e)
            {
              e.preventDefault();
              removeCoupon();
            });
          }
        }
    
        
        function removeCoupon()
        {
          
    
          $.ajax({
            url: $('#hf_base_url').val() + '/ajax/removeCoupon',
            type: 'POST',
            cache: false,
            dataType: 'json',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function (data)
            {
              if (data.success == true)
              {
                if ($('#cart_page, #checkout_page').find('.cart-data .error-msg-coupon').length > 0)
                {
                  $('#cart_page, #checkout_page').find('.cart-data .error-msg-coupon').parents('li').remove();
                }
    
                $('#cart_page .cart-total-content .cart-coupon, #checkout_page .cart-total-content .cart-coupon').remove();
                $('#cart_page .cart-total-content .cart-grand-total .value, #checkout_page .cart-total-content .cart-grand-total .value').html(data.grand_total);
    
              }
            },
            error: function () { }
          });
        }
    
        remove_user_coupon();
    
</script>