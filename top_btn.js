$(function(){ 
    //トップに戻るボタンの表示を変える処理
    var topbtn = $('.top_btn');   
    topbtn.hide(); //デフォルトで非表示
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) { //100pxスクロール以降から、トップに戻るボタン表示
            topbtn.fadeIn();
        } else {
            topbtn.fadeOut();
        }
    });
    // クリックイベント
    topbtn.click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 500); //0.5秒かけてトップへ移動
        return false;
    });

  });