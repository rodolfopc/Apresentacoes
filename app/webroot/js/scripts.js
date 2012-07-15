
function abrirPag(pagina,id){
    var params = "tags="+pagina+"&id="+id;
    var url = "/cakephp/tags/inserir/";
    var http;
    if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
        http=new XMLHttpRequest();
        }
    else
        {// code for IE6, IE5
        http=new ActiveXObject("Microsoft.XMLHTTP");
        }
    http.onreadystatechange = mudancaEstado;
    http.open("POST",url,true);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.setRequestHeader("Content-length", params.length);
    http.setRequestHeader("Connection", "close");
    http.send(params);
    
    if (http.readyState == 1) {
        document.getElementById('tags'+id).innerHTML = "carregando...";
    }
    
    //return pagina;
    
    function mudancaEstado(){
        if (http.readyState == 4){
            document.getElementById('tags'+id).innerHTML = http.responseText;
        }
    }
}

function tratarTags(id)
    {
     var params,params2,split_params,tag,tagtrim,igual=0;
     tag=document.getElementById('tag'+id).value;
     if((tag!="")&&(tag.trim()!=""))
         {
         params =  document.getElementById('campo_tags'+id).value;
         params2 = document.getElementById('tag'+id).value;
         split_params = params.split('_');
         for(var a=0;a<split_params.length;a++){
            if(split_params[a]==params2){
                igual++;
                }
            }
            if(igual!=0){
                alert("Tag já inserida.");
                }
            else{
                if(document.getElementById('campo_tags'+id).value==""){
                    params =  params2;
                    }
                else params =  params+"_"+params2;
                    document.getElementById('campo_tags'+id).value=params;
                    abrirPag(params,id);
                    }
                }
               document.getElementById('tag'+id).value=""; 
     }
    
    
    function removerTags(num,id)
        {
        var params,params2;
        params =  document.getElementById('campo_tags'+id).value;
        params2 = params.split('_');
        params2.splice(num,1);
        params2 = params2.join("_");
        document.getElementById('campo_tags'+id).value=params2;
        params = params2;
        abrirPag(params,id);
        }
         
    function OnEnter(evt,id)
        {
        var key_code = evt.keyCode  ? evt.keyCode  :
                       evt.charCode ? evt.charCode :
                       evt.which    ? evt.which    : void 0;

            if (key_code == 13)
            {
            tratarTags(id);
            }
        }
        
