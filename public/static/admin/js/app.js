window.IceAjax = {
    'POST' : function (dom,success,beforeSubmit) {
        if(beforeSubmit == undefined) {
            beforeSubmit = function (curform) {return true;}
        }
        dom.Validform({
            ajaxPost:true,
            tiptype:3,
            beforeSubmit:beforeSubmit,
            callback:success,
            datatype: {}
        })
    }
};

window.IceAlert = {
    'error' : function (msg,callback) {
        layui.layer.alert(msg ? msg : '服务器未知错误',{
            icon: 2
            ,title: '错误提示'
            ,skin: 'layui-layer-lan'
            ,anim: '6'
        },callback);
    },
    'success' : function (msg,callback) {
        layui.layer.alert(msg ? msg : '操作成功',{
            icon: 1
            ,title: '成功提示'
            ,skin: 'layui-layer-lan'
            ,anim: '5'
        },callback);
    },
    'alert' : function ($title,callback) {
        layui.layer.confirm($title,{
            btn: ['确定','取消']
        },callback)
    },
    'open' : function (url,title,width) {
        window.IceGetHttp && window.IceGetHttp.abort();
        window.IceGetHttp = $.get(url,function (data) {
            layui.layer.open({
                title: title,
                type: 1,
                skin: 'layui-layer-lan', //加上边框
                area: [width],
                content: data,
                anim: '5'
            });
        });
    }
};

window.IceRoute = {
    hashStr : '',
    changeFireArr : [],
    onHashChange : function () {
        if( ("onhashchange" in window) && ((typeof document.documentMode==="undefined") || document.documentMode==8)) {
            // 浏览器支持onhashchange事件
            window.onhashchange = IceRoute.hashChangeFire;  // TODO，对应新的hash执行的操作函数
        } else {
            // 不支持则用定时器检测的办法
            setInterval(function() {
                var ischanged = IceRoute.isHashchanged;
                if(ischanged) {
                    IceRoute.hashChangeFire();  // TODO，对应新的hash执行的操作函数
                }
            }, 150);
        }
    },
    isHashchanged : function () {
        if(IceRoute.hashStr == window.location.href) {
            return true;
        } else {
            return false;
        }
    },
    hashChangeFire : function () {
        IceRoute.changeFireArr.forEach(function (callback) {
            callback();
        })
    },
    addChangeFire : function (callback) {
        IceRoute.changeFireArr.push(callback);
    },
    initRoute: function () {
        IceRoute.onHashChange();
    },
    traggerChange: function () {
        IceRoute.hashChangeFire();
    }
};
IceRoute.initRoute();