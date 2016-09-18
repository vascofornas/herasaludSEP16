
    function ajaxCall() {
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

function locationInfo() {
    var rootUrl = "api.php";
   
    var call = new ajaxCall();
    this.getCities = function(id) {
        $(".cities option:gt(0)").remove();
        var url = rootUrl+'?type=getCities&stateId=' + id;
        var method = "post";
        var data = {};
        $('.cities').find("option:eq(0)").html("Procesando..");
        call.send(data, url, method, function(data) {
            $('.cities').find("option:eq(0)").html("Selecciona una ciudad");
            if(data.tp == 1){
                $.each(data['result'], function(key, val) {
                    var option = $('<option />');
                    option.attr('value', key).text(val);
                    $('.cities').append(option);
                });
                $(".cities").prop("disabled",false);
            }
            else{
                 alert(data.msg);
            }
        });
    };

    this.getCities = function(id) {
        $(".cities option:gt(0)").remove();
        var url = rootUrl+'?type=getCities&stateId=' + id;
        var method = "post";
        var data = {};
  	  $('.cities').find("option:eq(0)").html("Procesando..");
  	  call.send(data, url, method, function(data) {
  	    $('.cities').find("option:eq(0)").html("Selecciona una ciudad");
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
  	        $('.cities').append(option);
  	      });
  	      $(".cities").prop("disabled", false);
  	    } else {
  	      alert(data.msg);
  	    }
  	  });
  	};
    
    
    this.getStates = function(id) {
        $(".states option:gt(0)").remove(); 
        $(".cities option:gt(0)").remove(); 
        var url = rootUrl+'?type=getStates&countryId=' + id;
        var method = "post";
        var data = {};
  	  $('.states').find("option:eq(0)").html("Procesando..");
  	  call.send(data, url, method, function(data) {
  	    $('.states').find("option:eq(0)").html("Selecciona un estado o provincia");
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
  	        $('.states').append(option);
  	      });
  	      $(".states").prop("disabled", false);
  	    } else {
  	      alert(data.msg);
  	    }
  	  });
  	};

    
    
    
    
    

    this.getCountries = function() {
    	  var url = rootUrl + '?type=getCountries';
    	  var method = "post";
    	  var data = {};
    	  $('.countries').find("option:eq(0)").html("Procesando..");
    	  call.send(data, url, method, function(data) {
    	    $('.countries').find("option:eq(0)").html("Selecciona un pais");
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
    	        $('.countries').append(option);
    	      });
    	      $(".countries").prop("disabled", false);
    	    } else {
    	      alert(data.msg);
    	    }
    	  });
    	};

}

$(function() {
var loc = new locationInfo();
loc.getCountries();
 $(".countries").on("change", function(ev) {
        var countryId = $(this).val();
        if(countryId != ''){
        loc.getStates(countryId);
        }
        else{
            $(".states option:gt(0)").remove();
        }
    });
 $(".states").on("change", function(ev) {
        var stateId = $(this).val();
        if(stateId != ''){
        loc.getCities(stateId);
        }
        else{
            $(".cities option:gt(0)").remove();
        }
    });
});


