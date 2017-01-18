/**
 * 
 */
$(function() {
	$('.error').hide();
	$('#ins_identifiant').focus();
	check();
	window.setInterval("check()", 1000);
	
	$('#ins_identifiant').on('keyup click change', function() {
		notempty($('#ins_identifiant').val(), ".div-identifiant", ".error_identifiant");
	});
	$('#ins_password').on('keyup click change', function() {
		notempty($('#ins_password').val(), ".div-password", ".error_password");
	});

});

function check() {
	if (notempty($('#ins_identifiant').val(), ".div-identifiant",
			".error_identifiant")
			&& notempty($('#ins_password').val(), ".div-password",
					".error_password")) {
		$("#ins_connexion").attr('type', 'submit');
	} else {
		$("#ins_connexion").attr('type', 'button');
	}
}
