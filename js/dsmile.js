$(function() {
    $('input:eq(0)').focus();
    $('.ds-user').hover(function() { 
        $('.ds-user-operation').slideToggle(10); 
    });

});

var selctFlag = 0;
function enToch(en) {
    switch(en) {
        case 'buyer'      : return '客户';
        case 'provider'   : return '供应商';
        case 'production' : return '产品';
        case 'person'     : return '负责人';
        case 'factory'    : return '加工厂';
        case 'express'    : return '物流';
        default           :'无'; break;
    }
}

function postData(url, data, type = 0) {
    $.ajax({
            type:"POST",
            url: url,
            data: data,
            datatype: "json",
            success: function() {
                if(type) {
                    window.location.reload();
                }
            },
            error: function(){
                alert("提交错误！");
            }
        });
}
function getData(url, backFunction, item) {
    $.ajax({
            type:"GET",
            contentType: "application/x-www-form-urlencoded",
            url: url,
            datatype: "json",
            success: function(data) {
                backFunction(eval(data), item);
            },
            error: function(){
                alert("提交错误！");
            }
        });
}
function inputRegulation(obj, regulation,error) {
    $(obj).change(function() {
        var inputValue = $(this).val();
        var patter = new RegExp();
        var patter = regulation;
        if(!patter.test(inputValue)) {
            $(obj).focus();
            dsmileErrorAlert(error + '格式不正确！');
            }
    });

}
function dsmileModal(title, ensureFunc='modalHide'){
    var dsModal   = "<div class='ds-modal' ></div>";
    var dsRec     = "<div class='ds-modal-rect'></div>";
    var dsTitle   = "<div class='ds-modal-title'>"+title+"</div>";
    var dsInput0 = "<input type='text' class='ds-modal-text' placeholder = '还/付日期'/>";
    var dsInput1 = "<input type='text' class='ds-modal-text' placeholder = '还/付金额(元)'/>";
    var dsInput2 = "<input type='text' class='ds-modal-text' placeholder = '还/付摘要'/>";
    var dsButton  = "<div class=' ds-modal-button'></div>";
    var dsCancel = "<div class='ds-load-submit ds-info-cell' onClick='modalHide();'>取消</div>";
    var dsEnsure = "<div class='ds-load-submit ds-info-cell' onClick='"+ensureFunc+"();'>确定</div>";

    $( dsModal ).appendTo( 'body' );
    $( dsRec ).appendTo( '.ds-modal' );
    $( dsTitle ).appendTo( '.ds-modal-rect' ); 
    $( dsInput0 ).appendTo( '.ds-modal-rect' ); 
    $( dsInput1 ).appendTo( '.ds-modal-rect' );  
    $( dsInput2 ).appendTo( '.ds-modal-rect' );   
    $( dsButton ).appendTo( '.ds-modal-rect' );
    $( dsCancel ).appendTo( '.ds-modal-button' );
    $( dsEnsure ).appendTo( '.ds-modal-button' );
}

function modalHide() {
    $('.ds-modal').remove();
}
function gainInputInit( obj ) {
    $(obj).val(0);
}

function accordChange(obj1, slide, thenFunc = ''){
    obj1.bind('input propertychange',function(){
        selctFlag = 0;
        var text = $(this).val();
        var slideLength = slide.length;
        if(text) {
            for(var  i= 0; i < slideLength; i++) {
                var flag = slide[i];
                if($(flag).text().indexOf(text) > -1) {
                    $(flag).removeClass('ds-disappear');
                }else {
                    $(flag).addClass('ds-disappear');
                }
            }
        }else{
            for(var  i= 0; i < slideLength; i++) {
                var flag = slide[i];
                $(flag).removeClass('ds-disappear');
            }
        }
        if(thenFunc) {
            thenFunc();
        }
        obj1.siblings().children().not('.ds-disappear').first().addClass('ds-active').siblings().removeClass('ds-active');
    });
}

function getSlideValue(input, obj) {
  addActive($(input));
  $(input).focus(function() {
      selctFlag = 0;
      $(this).after($(obj));
      $(obj).show();
      $(obj+ ' .ds-slide').removeClass('ds-disappear').removeClass('ds-active');
      $(input).siblings().children().not('.ds-disappear').first().addClass('ds-active');  
  });
  $(obj+ ' .ds-slide').click(function() {
      $(this).parent().hide();
      var text = $(this).children().text();
      $(this).parent().siblings('input').val( text );
  });
  accordChange($(input), $(obj+ ' .ds-slide'));
}
function addActive(input) {  
    input.keydown(function(e){
        if(e.keyCode == 40 || e.keyCode == 38 || e.keyCode == 39) {
            var slides = input.siblings().children().not('.ds-disappear'); 
            switch (e.keyCode) {
                case 40: selctFlag < slides.length-2? selctFlag++ : null;break;
                case 38: selctFlag > 0? selctFlag-- : null;break;
                case 39: input.val($(slides[selctFlag]).children().text());input.siblings().hide();selctFlag = 0;$(input).removeAttr('keydown');break;
             }
            $(slides[selctFlag]).addClass('ds-active').siblings().removeClass('ds-active');
        }
     })
}
function findListRangeRows(begin, end, list, rowObj, notRow) {
    var rows = $(list).children().not(notRow);
    var rowsLength = rows.length; 
    for(var i=0; i<rowsLength; i++) {
        var value = $(rows[i]).find(rowObj).text();
        if(value < begin || value > end) {
            $(rows[i]).addClass('ds-disappear');
        }else {
            $(rows[i]).removeClass('ds-disappear');
        }
    }
}

function sortList(list, rowObj, des_asc = 1) {
    var rows       = $(list).children();
    var rowsLength = rows.length; 
    for(var i = 0 ; i < rowsLength; i++){     
        var beforeValue;    
        var afterVale;
        var flag = 0;
        var newRows = $(list).children();
        var newRowsLength = newRows.length; 
        beforeValue = $(newRows[i]).find(rowObj).text();
    for(var j = i ; j < newRowsLength; j++){
          afterVale = $(newRows[j]).find(rowObj).text();
         if(des_asc*(beforeValue - afterVale) <= 0){
             beforeValue = afterVale;
             flag = j;
          }    
        } 
        $(newRows[flag]).insertBefore($(newRows[i]));
      }
   }
   