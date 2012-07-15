$(document).ready(function () {$("#linkavancada").bind("click", function (event) {alert("hey you!");
return false;});
$("#linkavancada").bind("click", function (event) {$.ajax({async:true, dataType:"html", success:function (data, textStatus) {$("#divavancada").html(data);}, url:"\/cakephp\/buscas\/avancada"});
return false;});});