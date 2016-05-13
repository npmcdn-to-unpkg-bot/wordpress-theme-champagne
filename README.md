#####################################################################
#### Plugins à télécharger pour le bon fonctionnement du thème : ####
#####################################################################



=> indispensables : 
	- Multiple Post Thumbnails : permet de rajouter plusieurs images à la une. Utilisé par le thème pour que l'utilisateur puisse personnaliser ses pages avec ses propres images (notament les pages single-champagne.php). Se définit dans le fichier functions.php
		lien : https://fr.wordpress.org/plugins/multiple-post-thumbnails/
	- Regenerate Thumbnails : permet de regénérer la taille de toutes les images du site, quand une taille d'image est créée/modifiée via le fichier functions.php. Sans ce plugin, les tailles d'images précédemment chargées dans l'admin ne sont pas prises en compte. Indispensable en production, inutile quand le thème sera définitivement terminé et toutes les tailles d'image définies.
		lien: https://fr.wordpress.org/plugins/regenerate-thumbnails/

=> facultatifs :
	- Mailpoet : plugin qui permet de gérer des newsletters, via import par zonne de widgets. Défaut : payant (et très cher) dans sa version complète.
		lien : https://fr.wordpress.org/plugins/wysija-newsletters/
	- PageNavi : plugin qui permet de gérer la pagination du site, dans le cas où il y ait des dizaines d'articles de blog ou d'actualité et donc des pages previous/next à gérer. Défaut : un plugin pour une si petite fonctionnalité, c'est pécher ! à voir s'il n'existe pas de solution simple en dev maison.
		lien : https://fr.wordpress.org/plugins/wp-pagenavi/





#####################################################################
############# Explication des templates du thème : ##################
#####################################################################



=> 404.php
		page chargée quand la page que l'utilisateur veut afficher n'existe pas.

=> accueil.php
		Page du contenu de l'index du site
		
=> category.php
		Page appelée par wordpress pour afficher les catégories et sous-catégories par défaut. Contient la boucle qui affiche le contenu d'une catégorie d'articles. Possibilité d'affiner si nécessaire en créant des pages category-[id_de_la_sous_categorie].php pour un affichage différent des sous catégories (défaut : si le client édite une nouvelle catégorie, il ne sera pas à même de créer ce template personnalisé et du coup l'affichage sera celui de category.php).
		
=> contact.php
		Page de template pour un modèle de page 'contact', qui sera utilisé pour la page contact du site. Ainsi le client pourra renseigner ses coordonnées lui même à côté du formulaire.
		
=> footer.php
		Page qui contient le footer du site, appelé théoriquement sur chaque page. Possibilité de créer d'autres template de footer qui seront appelés en utilisant la fonction get_template_part()
		
=> functions.php
		Permet de créer des fonctions wp de toutes sortes.
		
=> header.php
		Contient la balise <head> du site, et doit donc être inclu dans chaque page.
		
=> index.php
		Page qui est chargée à l'entrée sur le site et contient les includes des différentes parties. Contient l'introduction.
		
=> index-sans-intro.php
		Template de page qui reprend le modèle d'index.php mais sans l'introduction. Il faut donc créer une page (nommée de préférence index pour les permaliens) dans l'admin qui sera appelée dans les différents menus de navigation du site. 

=> menu.php
		Contient la barre de menu principale du site, et doit donc être inclu dans chaque page.
		
=> page.php
		Si aucun modèle de page n'est définit à la création d'une page dans l'admin, c'est par défaut ce template qui affichera la page.
		
=> single.php
		Boucle utilisée pour charger le contenu d'un article. Utilisé pour les articles d'actu et de blog. Comme pour les catégories, possibilité d'affiner par catégorie en créant d'autres templates.
		
=> single-champagne.php
		Boucle utilisée pour charger le contenu d'un article de la taxonomie champagne. Utilise les fonctions de parallax de Materialize et affiche les images à la une choisies lors de la création du post.
		
=> taxonomy-cat-champ.php
		fonction identique au template category.php, mais pour la taxonomie champagne. Possibilité ne nommer ce template que taxonomy.php, mais si d'autres taxonomies sont créées, il sera possible de personnaliser les templates pour chacunes d'entre elles en précisant le 'slug' (définit dans le fichier functions.php)