$(function(){
	// Gestion du clic sur le bouton pour ouvrir le menu
	$('.nav-menu-burger').click(function(e){
		e.preventDefault(); // annule l'evenement de base du clic (exemple si clic sur un <a> : pas de redirection vers le href)
		$(".menu-burger", this).slideToggle(200);
		if ($(".open-menu-burger", this).hasClass('open-burger'))
			$(".open-menu-burger", this).removeClass("open-burger");
		else
			$(".open-menu-burger", this).addClass("open-burger");
	});
});