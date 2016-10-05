
    function ajaxCall_buscar() {
        this.send = function(data, url, method, success, type) {
          type = type||'json';
          var successRes = function(data) {
              success(data);
          };

          var errorRes = function(e) {
              console.log(e);
              alert("Error found \nError Code: "+e.status+" \nError Message: "+e.statusText);
          };
            $.ajax({
                url: url,
                type: method,
                data: data,
                success: successRes,
                error: errorRes,
                dataType: type,
                timeout: 60000
            });

          }

        }

function locationInfo_buscar() {
    var rootUrl = "api_buscar.php";
    alert ("BUSCAR");
   
    var call_buscar = new ajaxCall_buscar();
    this.getCiudades = function(id) {
        $(".ciudades option:gt(0)").remove();
        var url = rootUrl+'?type=getCiudades&estadoId=' + id;
        var method = "post";
        var data = {};
        $('.ciudades').find("option:eq(0)").html("Procesando..");
        call_buscar.send(data, url, method, function(data) {
            $('.ciudades').find("option:eq(0)").html("Selecciona una ciudad");
            if(data.tp == 1){
                $.each(data['result'], function(key, val) {
                    var option = $('<option />');
                    option.attr('value', key).text(val);
                    $('.ciudades').append(option);
                });
                $(".ciudades").prop("disabled",false);
            }
            else{
                 alert(data.msg);
            }
        });
    };

    this.getCiudades = function(id) {
        $(".ciudades option:gt(0)").remove();
        var url = rootUrl+'?type=getCiudades&estadoId=' + id;
        var method = "post";
        var data = {};
  	  $('.ciudades').find("option:eq(0)").html("Procesando..");
  	  call_buscar.send(data, url, method, function(data) {
  	    $('.ciudades').find("option:eq(0)").html("Selecciona una ciudad");
  	    console.log(data);
  	    if (data.tp == 1) {
  	      var arr = [];
  	      for (prop in data["result"]) {
  	        arr.push({
  	          [prop]: data["result"][prop]
  	        })
  	      }

  	      arr.sort(function(a, b) {
  	        return a[Object.keys(a)[0]].localeCompare(b[Object.keys(b)[0]])
  	      });

  	      $.each(arr, function(key, val) {
  	        var option = $('<option />');
  	        var prop = Object.keys(val)[0];
  	        option.attr('value', prop).text(val[prop]);
  	        $('.ciudades').append(option);
  	      });
  	      $(".ciudades").prop("disabled", false);
  	    } else {
  	      alert(data.msg);
  	    }
  	  });
  	};
    
    
    this.getEstados = function(id) {
        $(".estados option:gt(0)").remove(); 
        $(".ciudades option:gt(0)").remove(); 
        var url = rootUrl+'?type=getEstados&paisId=' + id;
        var method = "post";
        var data = {};
  	  $('.estados').find("option:eq(0)").html("Procesando..");
  	  call_buscar.send(data, url, method, function(data) {
  	    $('.estados').find("option:eq(0)").html("Selecciona un estado o provincia");
  	    console.log(data);
  	    if (data.tp == 1) {
  	      var arr = [];
  	      for (prop in data["result"]) {
  	        arr.push({
  	          [prop]: data["result"][prop]
  	        })
  	      }

  	      arr.sort(function(a, b) {
  	        return a[Object.keys(a)[0]].localeCompare(b[Object.keys(b)[0]])
  	      });

  	      $.each(arr, function(key, val) {
  	        var option = $('<option />');
  	        var prop = Object.keys(val)[0];
  	        option.attr('value', prop).text(val[prop]);
  	        $('.estados').append(option);
  	      });
  	      $(".estados").prop("disabled", false);
  	    } else {
  	      alert(data.msg);
  	    }
  	  });
  	};

    
    
    
    
    

    this.getPaises = function() {
    	  var url = rootUrl + '?type=getPaises';
    	  var method = "post";
    	  var data = {};
    	  $('.paises').find("option:eq(0)").html("Procesando..");
    	  call_buscar.send(data, url, method, function(data) {
    	    $('.paises').find("option:eq(0)").html("Selecciona un pais");
    	    console.log(data);
    	    if (data.tp == 1) {
    	      var arr = [];
    	      for (prop in data["result"]) {
    	        arr.push({
    	          [prop]: data["result"][prop]
    	        })
    	      }

    	      arr.sort(function(a, b) {
    	        return a[Object.keys(a)[0]].localeCompare(b[Object.keys(b)[0]])
    	      });

    	      $.each(arr, function(key, val) {
    	        var option = $('<option />');
    	        var prop = Object.keys(val)[0];
    	        option.attr('value', prop).text(val[prop]);
    	        $('.paises').append(option);
    	      });
    	      $(".paises").prop("disabled", false);
    	    } else {
    	      alert(data.msg);
    	    }
    	  });
    	};

}

$(function() {
var loc = new locationInfo_buscar();
loc.getPaises();
 $(".paises").on("change", function(ev) {
        var paisId = $(this).val();
        if(paisId != ''){
        loc.getEstados(paisId);
        }
        else{
            $(".estados option:gt(0)").remove();
        }
    });
 $(".estados").on("change", function(ev) {
        var estadoId = $(this).val();
        if(estadoId != ''){
        loc.getCiudades(estadoId);
        }
        else{
            $(".ciudades option:gt(0)").remove();
        }
    });
});


