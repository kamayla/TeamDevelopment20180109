$(function() {
    // $('.thumb-item').slick({
    //      infinite: true,
    //      slidesToShow: 1,
    //      slidesToScroll: 1,
    //      arrows: false,
    //      fade: true,
    //      asNavFor: '.thumb-item-nav' //サムネイルのクラス名
    // });
    // $('.thumb-item-nav').slick({
    //      infinite: true,
    //      slidesToShow: 4,
    //      slidesToScroll: 1,
    //      asNavFor: '.thumb-item', //スライダー本体のクラス名
    //      focusOnSelect: true,
    // });

    $('input[name=c_pay_type]:checked').show();

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

