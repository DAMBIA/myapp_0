/**
 * 
 */
$(function() {
	$('.error').hide();
	$('#ins_identifiant').focus();
	check();
	window.setInterval("check()", 1000);
	/*
	 * $('#').on('keyup click change', function() { });
	 */
	// alert($(':radio[name="sexe"]:checked').val());

});

function check() {
	if (notempty($('#ins_identifiant').val(), ".div-identifiant",
			".error_identifiant")) {
		$("#ins_connexion").attr('type', 'submit');
	} else {
		$("#ins_connexion").attr('type', 'button');
	}
}
