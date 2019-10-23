 (function(){
    // 初始化发送数据
    var param = {
        come_url : document.referrer,   //来访url
        call_url : document.location.href, //访问的url
        sys : window.navigator.platform,
        browse : '',
        area : '',
        ip : ''
    }


    // 判断浏览器和版本
    var ua = navigator.userAgent.toLowerCase();
    reg = {
        'IE' : ua.match(/msie ([\d.]+)/),
        'Firefox' : ua.match(/firefox\/([\d.]+)/),
        'Chrome' : ua.match(/chrome\/([\d.]+)/),
        'Opera' : ua.match(/opera.([\d.]+)/),
        'Safari' : ua.match(/version\/([\d.]+)/)
    }

    for(var i in reg) {
        if(reg[i] != null) { param.browse = i + ': ' + reg[i][1]; break; }
    }


    // 获取ip和ip所属地区
    var url = 'http://chaxun.1616.net/s.php?type=ip&output=json&callback=?&_='+Math.random();
    $.getJSON(url, function(data) {
        param.area = data.Isp;
        //param.area = 'js代码<script>alert("asdf")</script>';
        param.ip = data.Ip;
        push_info();
    });


    // 发送记录数据
    function push_info() {
        var push_url = '/admin_/add_count_flow';
        $.post(push_url, param);
    }

})();