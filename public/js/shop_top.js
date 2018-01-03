$(function() {
    $('.thumb-item').slick({
         infinite: true,
         slidesToShow: 1,
         slidesToScroll: 1,
         arrows: false,
         fade: true,
         asNavFor: '.thumb-item-nav' //サムネイルのクラス名
    });
    $('.thumb-item-nav').slick({
         infinite: true,
         slidesToShow: 4,
         slidesToScroll: 1,
         asNavFor: '.thumb-item', //スライダー本体のクラス名
         focusOnSelect: true,
    });
});