/**
 * fichier contenant toutes les fonctions de notre application
 */
/*
 * fonction permettant de test la valeur d'une variable
 */

function tesLongueur(champ1, champ2, champ3, champ4, str1, str2) {
	/*
	 * champ1= valeur à tester champ2= valeur à tester dans les cas où champ4
	 * vaut ">" ou "<"; champ3= valeur utilisée en plus de celle du champ2
	 * quand champ4 vaut "<<" champ4= égalité à tester
	 */
	if (champ1 == "") {
		$(str1).removeClass('has-success').addClass('has-error').addClass(
				'has-feedback');
		$(str2).show();
		alert("Veuillez entrer la valeur de référence à comparer dans le champ1");
		return false;
	} else {
		if (champ4 == ">") {
			/*
			 * test si champ1>champ2
			 */
			if (champ2 != "") {
				if (champ1 > champ2) {
					$(str1).removeClass('has-error').addClass('has-success')
							.addClass('has-feedback');
					$(str2).hide();
					return true;
				} else {
					$(str1).removeClass('has-success').addClass('has-error')
							.addClass('has-feedback');
					$(str2).show();
					return false;
				}

			} else {
				alert("Test de 'champ1 > champ2' veuillez entrer la valeur du deuxième champ");
				$(str1).removeClass('has-success').addClass('has-error')
						.addClass('has-feedback');
				$(str2).show();
				return false;
			}
		}
		if (champ4 == "<") {
			/*
			 * test si champ1<champ2
			 */
			if (champ2 == "") {
				alert("Test de 'champ1 < champ2' veuillez enter la valeur du deuxième champ");
				$(str1).removeClass('has-success').addClass('has-error')
						.addClass('has-feedback');
				$(str2).show();
				return false;
			} else {
				if (champ1 < champ2) {
					$(str1).removeClass('has-error').addClass('has-success')
							.addClass('has-feedback');
					$(str2).hide();
					return true;
				} else {
					$(str1).removeClass('has-success').addClass('has-error')
							.addClass('has-feedback');
					$(str2).show();
					return false;
				}
			}
		}
		if (champ4 == "<<") {
			/*
			 * test si champ2<champ1<champ3
			 */
			if (champ2 == "" || champ3 == "") {
				alert("Test de 'champ2 < champ1 < champ3' veuillez entrer les valeurs du deuxième et du troisième champ");
				$(str1).removeClass('has-success').addClass('has-error')
						.addClass('has-feedback');
				$(str2).show();
				return false;
			} else {
				if (champ1 > champ2 && champ1 < champ3) {
					$(str1).removeClass('has-error').addClass('has-success')
							.addClass('has-feedback');
					$(str2).hide();
					return true;
				} else {
					$(str1).removeClass('has-success').addClass('has-error')
							.addClass('has-feedback');
					$(str2).show();
					return false;
				}
			}
		}
		if (champ4 != "<" && champ4 != ">" && champ4 != "<<") {
			alert("Veuillez vérifier la valeur du champ4; les signes autorisés sont: >, < et <<");
			$(str1).removeClass('has-success').addClass('has-error').addClass(
					'has-feedback');
			$(str2).show();
			return false;
		}
	}
}

/*
 * Fonction permettant de tester la validité du format d'une adresse email
 */
function testformatemail(str, str1, str2, str3) {
	/*
	 * str = champ à tester
	 * str3 = champ du formulaire où sera stockée la reponse
	 */
	// Définition des caractères non autorisés dans une adresse email
	var autorisation = /[^a-zA-Z0-9.@_-]/;

	if (autorisation.test(str)) {
		// s'il y'a un caratère non autorisé, on retourne
		$(str1).removeClass('has-success').addClass('has-error').addClass(
				'has-feedback');
		$(str2).show();
		$(str3).attr('value',false);
		return false;
	} else {
		// premier caractère de la chaine
		var format1 = /^[-@._]{1}/;

		// dernier caractère de la chaine
		var format2 = /[_.@-]$/;
		if (format1.test(str) || format2.test(str)) {
			/*
			 * si le premier ou de le dernier caractère de la chaine est
			 * incorrect
			 */
			$(str1).removeClass('has-success').addClass('has-error').addClass(
					'has-feedback');
			$(str2).show();
			$(str3).attr('value',false);
			return false;
		} else {
			// on teste la chaine
			var format = /[a-z0-9]+@+[a-z]+\.[a-z]/;
			if (format.test(str)) {
				// Si le format est valide
				/*
				 * $(str1).removeClass('has-error').addClass('has-success').addClass('has-feedback');
				 * $(str2).hide();
				 */
				
				return true;
			} else {
				// Si le format est invalide
				$(str1).removeClass('has-success').addClass('has-error')
						.addClass('has-feedback');
				$(str2).show();
				$(str3).attr('value',false);
				return false;
			}
		}

	}
}

/*
 * Fonction permettant de tester la validité d'un mot de passe
 */
function testpassword(str, longueur, str1, str2) {
	/*
	 * str= chaine à tester longueur= longueur minimale du mot de passe
	 */
	// Test du premier caractère de la chaine
	var first = /^[A-Z]{1}/;

	if (!first.test(str)) {
		// Si le premier caractère est invalide
		$(str1).removeClass('has-success').addClass('has-error').addClass(
				'has-feedback');
		$(str2).show();
		return false;
	} else {
		// on teste si le mot de passe contient au moins un chiffre
		var chiffre = /[0-9]/;
		if (!chiffre.test(str)) {
			// Si la chaine ne contient aucun chiffre
			$(str1).removeClass('has-success').addClass('has-error').addClass(
					'has-feedback');
			$(str2).show();
			return false;
		} else {
			// on teste la longueur de la chaine
			if (str.length < longueur) {
				// Si la longueur de la chaine n'est pas valide
				$(str1).removeClass('has-success').addClass('has-error')
						.addClass('has-feedback');
				$(str2).show();
				return false;
			} else {
				// mot de passe correct
				$(str1).removeClass('has-error').addClass('has-success')
						.addClass('has-feedback');
				$(str2).hide();
				return true;
			}
		}
	}
}

/*
 * fonction permettant de tester si une chaine est vide
 */
function empty(str, str1, str2) {
	/*
	 * str= chaine à tester
	 */
	if (str == "") {
		$(str1).removeClass('has-error').addClass('has-success').addClass(
				'has-feedback');
		$(str2).hide();
		return true;
	} else {
		$(str1).removeClass('has-success').addClass('has-error').addClass(
				'has-feedback');
		$(str2).show();
		return false;
	}
}
/*
 * fonction permettant de tester si une chaine est non vide
 */
function notempty(str, str1, str2) {
	/*
	 * str= chaine à tester str1= classe à modifier str2= classe contenant le
	 * message d'erreur
	 */
	if (str == "") {
		$(str1).removeClass('has-success').addClass('has-error').addClass(
				'has-feedback');
		$(str2).show();
		return false;
	} else {
		$(str1).removeClass('has-error').addClass('has-success').addClass(
				'has-feedback');
		$(str2).hide();
		return true;
	}
}