/**
 * 
 */
$(function() {

	$('#ins_nom').focus();
	check();
	window.setInterval("check()", 1000);
	checkPassword();
	// window.setInterval("checkPassword()", 1000);
	$('.error_password').hide();
	$('.error_repassword').hide();

	testEmail();

	$('.error_email').hide();
	$('.error').hide();
	$('#ins_email').on('keyup', function() {
		testEmail();
	});
	$('#ins_password').on('keyup', function() {
		checkPassword();
	});

	$('#ins_repassword').on('keyup', function() {
		checkPassword();
	});

});

function check() {
	if (notempty($('#ins_nom').val(), ".div-nom", ".error_nom")
			&& notempty($('#ins_naissance_date').val(), ".div-naissance_date",
					".error_naissance_date")
			&& notempty($('#ins_naissance_ville').val(),
					".div-naissance_ville", ".error_naissance_ville")
			&& notempty($('#ins_naissance_pays').val(), ".div-naissance_pays",
					".error_naissance_pays")
			&& $('#test_email').val() == "true"
			&& $('#test_password').val() == "true") {
		$("#ins_inscription").attr('type', 'submit');
	} else {
		$("#ins_inscription").attr('type', 'button');
	}
}

function checkPassword() {
	testpassword($("#ins_password").val(), 8, ".div-password",
			".error_password");
	if ($('#ins_password').val() != $('#ins_repassword').val()) {
		$(".div-test-password").removeClass('has-success')
				.addClass('has-error').addClass('has-feedback');
		$("#test_password").attr('value', false);
		$(".error_repassword").show();
	} else {
		if (testpassword($("#ins_password").val(), 8, ".div-password",
				".error_password")
				&& testpassword($("#ins_repassword").val(), 8,
						".div-repassword", ".error_repassword")) {
			$(".div-test-password").removeClass('has-error').addClass(
					'has-success').addClass('has-feedback');
			$(".error_repassword").hide();
			$("#test_password").attr('value', true);
		} else {
			$(".div-test-password").removeClass('has-success').addClass(
					'has-error').addClass('has-feedback');
			$(".error_repassword").show();
			$("#test_password").attr('value', false);
		}
	}
}

function testEmail() {
	var str1 = '.div-email';
	var str2 = '.error_email';
	var str3 = '#test_email';

	$(str3).attr('value', false);
	$(str1).removeClass('has-success').addClass('has-error').addClass(
			'has-feedback');
	if (testformatemail($('#ins_email').val(), str1, str2, str3)) {
		$(str2).hide();

		var image = document.getElementById("loading_email");
		if (image.hasChildNodes()) {
			var element = document.getElementById("loading_img_emai");
			element.parentNode.removeChild(element);
		}
		var img = document.createElement("IMG");
		img.setAttribute("alt", "Loading");
		img.setAttribute("id", "loading_img_emai");
		img.setAttribute("src", "/img/loading_img_email.gif");
		image.appendChild(img);

		$
				.ajax({
					type : "post",
					url : 'isAvailbleEmail',
					cache : false,
					data : {
						email : $('#ins_email').val()
					},
					success : function(response) {
						$(str3).attr('value', response);
						var element = document
								.getElementById("loading_img_emai");
						element.parentNode.removeChild(element);
						if (response) {
							$(str1).removeClass('has-error').addClass(
									'has-success').addClass('has-feedback');
							$(str2).hide();
						} else {
							$(str1).removeClass('has-success').addClass(
									'has-error').addClass('has-feedback');
							$(str2).show();
						}

					},
					error : function() {
						alert("Erreur dans la fonction ajax de test de la disponibilité de l'adressee email du fichier inscription.js");
					}
				});
	}
}