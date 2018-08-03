MAPINCO INFINITE SCROLL
par Julien Appert
https://mapinco.fr

Le plugin est basé sur le script https://infiniteajaxscroll.com (v2.3.1).
Afin de sauvegarder les statistiques, il appelle la fonction pageTracker._trackPageview() de Google Analytics à chaque affichage.

Pour le personnaliser, utiliser le filtre "mapinscroll_options" de la manière suivante :

add_filter('mapinscroll_options', 'my_theme_mapinscroll_options',10, 2);
function my_theme_mapinscroll_options($options, $context){
	if($context == 'archive'){
		$options['offset'] = 5;
	}
	return $options;
} 

Deux contextes sont possibles : "archive" ou "single".
Le tableau d'options par défaut :
		array(
			'negativeMargin'	=>	10,
			'spinner'	=>	'<div class="ias-spinner" style="text-align: center;"><img src="{src}"/></div>',
			'container'	=> "#content",
			'item'	=> ".post",
			'pagination'	=> ".navigation",
			'next'	=>	'.navigation .nav-previous a',		
			'more' => '<div class="mapinscroll_more"><a >Plus de sujets</a></div>',
			'noneLeft'	=>	'<div class="mapinscroll_noneLeft"><span>Vous êtes arrivé à la fin.</span></div>'
		);	
		


