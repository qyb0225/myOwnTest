function loading(){
    var loading_div=$('<div></div>');
    loading_div.addClass('loading');
    var loading_img=$('<img/>');

    loading_img.attr('src','./img/loading.gif');
    loading_img.css({
        'width':'100px',
        'margin-top':($(window).height()-100)/2,
        'margin-left':($(window).width()-100)/2

    });
    loading_img.appendTo(loading_div);
    loading_div.appendTo('body');

}