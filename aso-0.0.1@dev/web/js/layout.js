/**
 * 
 */
$(function() {
	isAvaibleSession();
	window.setInterval("isAvaibleSession()", 3000);
	menu();
	$(window).on('resize', function() {
		menu();
	});

});

function isAvaibleSession() {
	$.ajax({
		type : "post",
		url : 'isAvailbleConnexion',
		cache : false,
		data : '',
		success : function(response) {
			$("#isSession").attr('value', response);
		},
		error : function() {
			// alert("Erreur dans la fonction ajax de test de l'existance d'une
			// session du fichier layout.js");
		}
	});


}

function menu(){
	if (window.innerWidth < 992) {
		$("#menu-principal").addClass('collapse out');
		$("#btn-menu-principal").click(function() {
			$("#menu-principal").collapse('toggle');
		});
	} else {
		$("#menu-principal").removeClass('collapse out');
	}
}
