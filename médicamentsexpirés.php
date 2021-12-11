<!DOCTYPE html>
<html>

<head>
	<title>Gérer les Médicaments </title>
	<?php require 'menu.php'; ?>
	<link rel="stylesheet" href="stylebis.css"> <!--On fait appel, ici, au fichier css qui va permettre de modifier le design de la page web-->
</head>

<body>

	<hr><br><br>

	<div class="divafficher">
	
    <table>

		<thead>

        	<tr>
            	<th><u>Liste des Médicaments</u></th>
        	</tr>

        	<tr>
        		<td>Identifiant</td>
        		<td>Nom</td>
        		<td>Date d'expiration</td>
        		<td>Prix</td>
        		<td>Stock </td>
        	</tr>

        </thead>
        
        <tbody>

    	   <?php

                try{$bdd = new PDO('mysql:host=localhost;dbname=pharmacie ynrb;charset=utf8', 'root', '');}
                //Connexion à la base de données : Cette méthode vérifie directement la connexion à la base de donnée

                //host, nom de base de donnée, type, username et mot de passe
                catch(Exception $e){die('Erreur : '.$e->getMessage());}
                // Message d'erreur en cas de non connexion

                $reponce = $bdd->query('SELECT * FROM médicaments WHERE Expire < NOW()');
                // Requpete donnant accès aux données de la table médicaments et plus préciséments aux médicaments qui ont expirés
   
                if($reponce->rowCount() == 0) { // Si la requête n'a pas été executée c'est que qu'il n'y a pas de médicaments expirés, il faut donc afficher le message suivant
                    ?> 

                    <p class="errortext"><?php echo "Aucun médicaments n'a expiré."; 

                }?></p>
      
                <?php

                while($donnees = $reponce->fetch()) {?>
                    <!-- Tant que les données sont existent, ecécuter la requete -->
                
	
                    <tr>
                   	    <td><?php echo $donnees['Midentifiant'];?></td>
                        <!-- Afficher les donnees de la colonne midentifiant-->
                        <td><?php echo $donnees['Nom'];?></td>
                        <!-- Afficher les donnees de la colonne nom-->
                        <td><?php echo $donnees['Expire'];?></td>
                        <!-- Afficher les donnees de la colonne expire-->
                        <td><?php echo $donnees['Prix'];?></td>
                        <!-- Afficher les donnees de la colonne prix-->
                        <td><?php echo $donnees['Stock'];?></td>
                        <!-- Afficher les donnees de la colonne stock-->
                    </tr>

                <?php   }?>  

            </tbody>

        </table>

    </div>
    
</body>
</html>