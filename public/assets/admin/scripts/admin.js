


var Http = {

    get : function(url,callback){
        //$.ajax({url:url,method:'get',success:function(result){
        //    callback(result);
        //});

    }

}



$(".y-click").click(function(){

    var url = $(this).attr("y-url");
    var method = $(this).attr("y-method");
    var data = {};

    if(method == "delete"){
        var isSure = window.confirm("确定删除?");
        if(!isSure) return;
    }

    $.ajax({url:url,method:method,data:data, success:function(result){
        if(result.code == 200){
            alert(result.message);location.reload();return;
        }
        alert(result.message);

    }});
});