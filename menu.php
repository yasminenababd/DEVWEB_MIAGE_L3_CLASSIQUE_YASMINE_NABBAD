<head>	

	<meta charset="UTF-8">
	<meta name="description" content="Application web dynamique de gestion de la pharmacie YNRB.">
	<meta name="keywords" content="pharmacie, gestion, medicaments, clients, crédits">
	<meta name="author" content="Yasmine Nabbad, Rayane Boumarate">


	<!-- CSS files -->
	<link rel="stylesheet" href="stylebis.css">

</head>

<body>

	<!--preloading-->

	<div id="preloader">

    	<div id="status">

        	<span> </span>

        	<span> </span>

    	</div>

	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script> setTimeout(function(){ $('#preloader').fadeToggle(); 500;});</script>

	<!--fin du preload-->

	<header> <!--En tête de page (à chaque page grâce au code php require)-->

		<nav> <!--Barre de menu permettant de naviguer entre toutes les pages facilement-->

			<ul>

				<li> <a href="Acceuil.php"><img src="logo.png" alt="logo" style="width: 75px;"></a></li> <!--Appuyer sur l'image (le logo) permet de retourner à la page d'acceuil-->
				<li class="clients"> <a href="Clients.php">Clients</a> </li> <!--Appuyer sur ce texte permet d'accéder à la page des clients-->
				<li class="crédits"> <a href="Crédits.php">Crédits</a></li> <!--Appuyer sur ce texte permet d'accéder à la page des crédits-->
				<li class="médicaments"><a href="Médicaments.php">Médicaments</a></li> <!--Appuyer sur ce texte permet d'accéder à la page des médicaments-->
				<li class="déconnexion"><a href="Login.php">Déconnexion</a></li> <!--Appuyer sur ce texte permet d'accéder à la page des login et donc de se déconnecter-->
				<li class="quitter"><a href="Quitter.php">Quitter</a></li> <!--Appuyer sur ce texte permet de fermer l'onglet-->

			</ul>

		</nav>

	</header>

</body>