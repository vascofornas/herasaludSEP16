$(document).ready(function() {  

$(".tablesearch_ver").hide();
// Search

$.ajax({
	type: "GET",
	url: "php/ver.php",
	
	cache: false,
	success: function(html){
		$("table#resultTable_ver tbody").html(html);
	}
	
});
	


});