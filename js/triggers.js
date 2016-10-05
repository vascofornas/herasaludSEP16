$(document).ready(function() {  

$(".tablesearch").hide();
// Search


function search() {
	var query_value = $('input#name').val();
	var e = document.getElementById("listaEspecialidades_buscar");
	var especialidad =  e.options[e.selectedIndex].text;
	if (especialidad == ''){
		alert ('selecciona una especialidad médica');
		document.getElementById("name").value='';
		return;
	}
	
	
	if(query_value !== ''){
		$.ajax({
			type: "GET",
			url: "php/search.php",
			data: { query: query_value, esp: especialidad},
			cache: false,
			success: function(html){
				$("table#resultTable tbody").html(html);
			}
			
		});
	
	}return false;    
}

$("input#name").on("keyup", function(e) {
	// Set Timeout
	clearTimeout($.data(this, 'timer'));
	
	// Set Search String
	var search_string = $(this).val();
	
	// Do Search
	if (search_string == '') {
		$(".tablesearch").fadeOut(300);
	}else{
		$(".tablesearch").fadeIn(300);
		$(this).data('timer', setTimeout(search, 100));
	};
});

});