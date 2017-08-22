(function($){
	// 表单JSON序列化
    $.fn.serializeJson=function(){  
        var serializeObj={};  
        var array=this.serializeArray();  
        var str=this.serialize();  
        $(array).each(function(){  
            if(serializeObj[this.name]){  
                if($.isArray(serializeObj[this.name])){  
                    serializeObj[this.name].push(this.value);  
                }else{  
                    serializeObj[this.name]=[serializeObj[this.name],this.value];  
                }  
            }else{  
                serializeObj[this.name]=this.value;   
            }  
        });  
        return serializeObj;  
    };  
    // 获取URL参数
    $.fn.getURLParameter=function(){  
        return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search)||[,''])[1].replace(/\+/g, '%20'))||null;
    };
    // 获取更新后的html
    var oldHTML = $.fn.html;
    $.fn.formhtml = function () {
        if (arguments.length) return oldHTML.apply(this, arguments);
        $("input,textarea,button", this).each(function () {
            this.setAttribute('value', this.value);
        });
        $(":radio,:checkbox", this).each(function () {
            // im not really even sure you need to do this for "checked"
            // but what the heck, better safe than sorry
            if (this.checked) this.setAttribute('checked', 'checked');
            else this.removeAttribute('checked');
        });
        $("option", this).each(function () {
            // also not sure, but, better safe...
            if (this.selected) this.setAttribute('selected', 'selected');
            else this.removeAttribute('selected');
        });
        return oldHTML.apply(this);
    };
    $.fn.html = $.fn.formhtml;
})(jQuery); 

function isWeiXin(){
    var ua = window.navigator.userAgent.toLowerCase();
    if(ua.match(/MicroMessenger/i) == 'micromessenger'){
        return true;
    }else{
        return false;
    }
}
var requestAjax = function(params, type, url, callback, async) {
    if(!callback){
        callback = function(msg){
            if(msg.result == 0){
                layer.msg(msg.description,{shift: -1,icon:1},function(){
                    window.location.reload();
                })
            }else{
                layer.msg(msg.description,{icon:2});
            }
        }
    }
    $.ajax({
        url: url,
        async: !async,
        type: type,
        data: params,
        dataType: 'json',
        success: function(data){
            callback(data);
        },
        error:function(){
            if(window.console){
                console.error('*******************************************************************');
                console.error('on  '+url+'  error');
            }
        }
    });
};
