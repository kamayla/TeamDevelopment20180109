$(function() {

        $('#login_btn').mouseover(function(){
            $('.top-login-wrapper').css("display","inline-block");
        });

        $('.top-login-wrapper').mouseleave(function(){
            $('.top-login-wrapper').css("display","none");
        })  

        $('#login_btn').click(function(){
            $('.top-login-wrapper').css("display","none");
        });

    $("#reviewBtn").on("click",function(){
        if($('.write_review').css("display","none")){
            $('.write_review').show();
            $("#reviewBtn").text('Close the window');
        }else{
            $('.write_review').hide();
            $("#reviewBtn").text('Write a review');
        }
    });

    $( '#c_pay_type1' ).change( function() {  
        $('.credit_pattern_2').hide();
        $('.credit_pattern_3').hide();
        $('.credit_pattern_1').show();
        });

    $( '#c_pay_type2' ).change( function() {
        $('#paypalBtn').show();
        $('.credit_pattern_1').hide();
        $('.credit_pattern_3').hide();
        $('.credit_pattern_2').show(1000);
        });

    $( '#c_pay_type3' ).change( function() {  
        $('.credit_pattern_1').hide();
        $('.credit_pattern_2').hide();
        $('.credit_pattern_3').show();
        });

        $('#paypalBtn').on('click',function(){
            $('#paypalBtn').hide();
            $('#confirm').show();
        })
});

