$(document).ready(function(){
	$('select').change(function(e){

		var dni = $(e.target).data('dni');
		var selector = '#' + dni.toString() + " option:selected";
		$('#tipo').val($(selector).val());
        $('#dni').val(dni) ;

		$('form').submit() ;
	}) ;
});