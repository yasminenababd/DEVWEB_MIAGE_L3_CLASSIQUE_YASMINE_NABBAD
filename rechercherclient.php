<!DOCTYPE html>
<html>

<head>

    <title>Recherche de Clients </title>
    <?php require 'menu.php'; ?>
    <link rel="stylesheet" href="stylebis.css">

</head>

<body>

    <hr><br><br>

    <div class="divafficher">

        <table>

            <thead>
            
                <tr>
                    <th><u>Liste des Clients</u></th>
                </tr>

                <tr>
                    <td>Identifiant</td>
                    <td>Nom</td>
                    <td>Téléphone</td>
                    <td>Sécurité Sociale</td>
                    <td>Adresse </td>
                    <td>Crédits </td>
                </tr>

            </thead>

            <tbody>

                <?php

                    try{$bdd = new PDO('mysql:host=localhost;dbname=pharmacie ynrb;charset=utf8', 'root', '');}
                    catch(Exception $e){die('Erreur : '.$e->getMessage());}


                    $reponce = $bdd->query('SELECT * FROM clients');
    
                    if(isset($_POST['variable']) AND !empty($_POST['variable'])) {
   
                        $variable = htmlspecialchars($_POST['variable']);
                        $reponce = $bdd->query('SELECT * FROM clients WHERE Nom LIKE "%'.$variable.'%"');
                    }

                    if($reponce->rowCount() == 0) {
                    
                    ?>
                        <p class="errortext"><?php echo "Aucun client à ce nom n'a été trouvé dans votre inventaire."; 

                    }?></p>
      
                    <?php

                        while($donnees = $reponce->fetch()){ 

                            ?>
                            <tr>
                                <td><?php echo $donnees['Identifiant'];?></td>
                                <td><?php echo $donnees['Nom'];?></td>
                                <td><?php echo $donnees['Téléphone'];?></td>
                                <td><?php echo $donnees['Sécurité'];?></td>
                                <td><?php echo $donnees['Adresse'];?></td>
                                <td><?php echo $donnees['Crédits'];?></td>    
                            </tr>

                    <?php   }?>  

            </tbody>

        </table>

    </div>

</body>
</html>