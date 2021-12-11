<!DOCTYPE html>
<html>

<head>

	<title>Gérer les Médicaments </title>
	<?php require 'menu.php'; ?>
	<link rel="stylesheet" href="stylebis.css">

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
                        catch(Exception $e){die('Erreur : '.$e->getMessage());}

                        $reponce = $bdd->query('SELECT * FROM médicaments');
	
                        if(isset($_POST['variable']) AND !empty($_POST['variable'])) {
   
                            $variable = htmlspecialchars($_POST['variable']);
                            $reponce = $bdd->query('SELECT * FROM médicaments WHERE Nom LIKE "%'.$variable.'%"');
                        }

                        if($reponce->rowCount() == 0) {
                            
                            ?> 
                            <p class="errortext"><?php echo "Aucun médicaments à ce nom n'a été trouvé dans votre inventaire."; 

                        }?></p>
      

                    <?php

                        while($donnees = $reponce->fetch()) {?>
	
                            <tr>
                   	            <td><?php echo $donnees['Midentifiant'];?></td>
                                <td><?php echo $donnees['Nom'];?></td>
                                <td><?php echo $donnees['Expire'];?></td>
                                <td><?php echo $donnees['Prix'];?></td>
                                <td><?php echo $donnees['Stock'];?></td>
                            </tr>

                    <?php   }?>  
                </tbody>

            </table>

        </div>

    </body>

</html>