$(document).ready(initMap());

function initMap() {
    createMap();//创建map并通过ip定位到城市
    addMapController();//为地图添加控件
    // 随机向地图添加25个标注
    var point = new BMap.Point(87.68, 43.77);
    var bounds = map.getBounds();
    var sw = bounds.getSouthWest();
    var ne = bounds.getNorthEast();
    var lngSpan = Math.abs(sw.lng - ne.lng);
    var latSpan = Math.abs(ne.lat - sw.lat);
    for (var i = 0; i < 10; i ++) {
        var point = new BMap.Point(sw.lng + lngSpan * (Math.random() * 0.7), ne.lat - latSpan * (Math.random() * 0.7));
        addMarker(point);
    }
//        var myCity = new BMap.LocalCity().get(function (result){
//            var cityName = result.name;
//            map.setCenter(cityName);   //关于setCenter()可参考API文档---”传送门“
//            //alert(cityName);
//        });

    //根据经纬度定位具体位置
    //var geolocation = new BMap.Geolocation();  //实例化浏览器定位对象。
    //下面是getCurrentPosition方法。调用该对象的getCurrentPosition()，与HTML5不同的是，这个方法原型是getCurrentPosition(callback:function[, options: PositionOptions])，也就是说无论成功与否都执行回调函数1，第二个参数是关于位置的选项。 因此能否定位成功需要在回调函数1中自己判断。
    //geolocation.getCurrentPosition(function (r) {   //定位结果对象会传递给r变量
    //    if (this.getStatus() == BMAP_STATUS_SUCCESS) {  //通过Geolocation类的getStatus()可以判断是否成功定位。
    //        var mk = new BMap.Marker(r.point);    //基于定位的这个点的点位创建marker
    //        map.addOverlay(mk);    //将marker作为覆盖物添加到map地图上
    //        map.panTo(r.point);   //将地图中心点移动到定位的这个点位置。注意是r.point而不是r对象。
    //        //alert('您的位置：'+r.point.lng+','+r.point.lat);  //r对象的point属性也是一个对象，这个对象的lng属性表示经度，lat属性表示纬度。
    //    }
    //    else {
    //        alert('failed' + this.getStatus());
    //    }
    //}, {enableHighAccuracy: true})
}
// 编写自定义函数,创建标注
function addMarker(point){
    var marker = new BMap.Marker(point);
    map.addOverlay(marker);
}

function createMap() {
    var map = new BMap.Map("allmap");
    var point = new BMap.Point(87.68, 43.77);
    map.centerAndZoom(point, 15);//将point移到浏览器中心
    var mak = new BMap.Marker(point);
    map.addOverlay(mak);
    window.map = map;
}
function addMapController() {
    //map.addControl(new BMap.ScaleControl());//比例尺控件
    map.addControl(new BMap.OverviewMapControl());//缩略地图控件
    map.addControl(new BMap.MapTypeControl());//地图类型控件
    map.enableScrollWheelZoom(true);//鼠标滑动放大缩小
    var ctrl_nav = new BMap.NavigationControl({anchor: BMAP_ANCHOR_TOP_LEFT, type: BMAP_NAVIGATION_CONTROL_LARGE});
    map.addControl(ctrl_nav);//地图平移缩放控件

    // 添加定位控件
    //var geolocationControl = new BMap.GeolocationControl();
    //geolocationControl.addEventListener("locationSuccess", function (e) {
    //    // 定位成功事件
    //    var address = '';
    //    address += e.addressComponent.province;
    //    address += e.addressComponent.city;
    //    address += e.addressComponent.district;
    //    address += e.addressComponent.street;
    //    address += e.addressComponent.streetNumber;
    //    alert("当前定位地址为：" + address);
    //});
    //geolocationControl.addEventListener("locationError", function (e) {
    //    // 定位失败事件
    //    alert(e.message);
    //});
    //map.addControl(geolocationControl);
}






