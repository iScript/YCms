


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
    $.ajax({url:url,method:method,data:data, success:function(result){


    }});
});