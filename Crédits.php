<!DOCTYPE html>
<html>

<head>

	<title>Liste des Crédits</title>
    <link rel="stylesheet" href="stylebis.css"> <!--On fait appel, ici, au fichier css qui va permettre de modifier le design de la page web-->
	<?php require 'menu.php';?>

</head>

<body>

<hr>
    
    <div>

            <form method="POST" action="remboursement.php"> <!--Le formulaire nous redirige vers la page remboursement.php-->

                <h1> Remboursement </h1><br>

                <p>Identifiant : <input type="text" name="id" style="display: block; float:right; width: 88%"><br><br>
                Somme remboursée : <input type="text" name="remboursée" style="display: block; float:right; width: 88%">
                
                </p><br>

                    <input type="submit" value="Rembourser"> <!--Quand l'employé appuie sur ce bouton, les informations du formulaires sont envoyées à la page crédits.php-->
                    <input type="reset" value="Recommencer"> <!--Quand l'employé appuie sur ce bouton, les informations du formulaires sont réinitialisées-->

            </form>

        </div><br>

    <div>


        <form method="POST" action="recherchecrédit.php"> <!--Le formulaire nous redirige vers la page recherchecrédit.php-->

            <input style="margin-left: 0%; width: 100%"type="search" name="variable" placeholder="Rechercher un client...">

        </form>

    </div>

<br><hr><br><br>

	<div class="divafficher">
	
        <table>
		
            <thead>
        	   
               <tr>
                    <th>Liste des Crédits</th>
        	   </tr>
        	
                <tr>
        		  <td>Identifiant</td>
        		  <td>Nom</td>
        		  <td>Crédits </td>
        	   </tr>
            
            </thead>

            <tbody>

                <?php

                    try{$bdd = new PDO('mysql:host=localhost;dbname=pharmacie ynrb;charset=utf8', 'root', '');}
                    //Connexion à la base de données : Cette méthode vérifie directement la connexion à la base de donnée

                    //host, nom de base de donnée, type, username et mot de passe

                    catch(Exception $e){die('Erreur : '.$e->getMessage());} 
                    // Message d'erreur en cas de non connexion

                    $reponse = $bdd->query('SELECT * FROM clients');
                    // Requpete donnant accès aux données de la table clients

                ?>

                <?php
            
                    while($donnees = $reponse->fetch()) {?>
                        <!-- Tant que les données sont existent, ecécuter la requete -->
                
                    <tr>
                        <td><?php echo $donnees['Identifiant'];?></td>
                        <!-- Afficher les donnees de la colonne identifiant-->
                        <td><?php echo $donnees['Nom'];?></td>
                        <!-- Afficher les donnees de la colonne Nom-->
                        <td><?php echo $donnees['Crédits'];?></td>
                        <!-- Afficher les donnees de la colonne Crédit-->
                    </tr>
        
                <?php   }?>  

            </tbody>

        </table>

    </div>

</body>
</html>