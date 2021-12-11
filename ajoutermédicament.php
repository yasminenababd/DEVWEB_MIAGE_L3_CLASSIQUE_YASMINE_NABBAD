<!DOCTYPE html>
<html>

<head>

	<title>Liste des Médicaments</title>
	<link rel="stylesheet" href="stylebis.css"> <!--On fait appel, ici, au fichier css qui va permettre de modifier le design de la page web. Avoir un fichier CSS pour une page de traitement de données peut parraître non nécessaire. Cependant, nous avons trouvé ça plus intéressant d'avoir un design plaisant, en cas d'erreur-->


</head>

<body>

	<p class="retour">
		<a href='Médicaments.php'>Retour</a> <!--Ce lien permet de retourner à la page Clients en cas d'erreur-->
	</p>

</body>
</html>

<?php 

// Create connection
$objetPdo = new PDO('mysql:host=localhost;dbname=pharmacie ynrb','root',''); // ici nous nous connectons connectons à la base de données sur mysql (phpmyadmin pour nous)

$pdoStat = $objetPdo->prepare('INSERT INTO médicaments VALUES (:Midentifiant, :Nom, :Expire, :Prix, :Stock)'); //Ici on prépare l'insertion des valeurs saisies 

$pdoStat->bindValue(':Midentifiant', $_POST['identifiant'],PDO::PARAM_INT);
$pdoStat->bindValue(':Nom', $_POST['nom'],PDO::PARAM_STR);
$pdoStat->bindValue(':Expire', $_POST['date'],PDO::PARAM_STR);
$pdoStat->bindValue(':Prix', $_POST['prix'],PDO::PARAM_INT);
$pdoStat->bindValue(':Stock', $_POST['stock'],PDO::PARAM_INT);

if(!empty($_POST['identifiant']) AND !empty($_POST['nom']) AND !empty($_POST['date']) AND !empty($_POST['prix']) AND !empty($_POST['stock'])){ //Ces conditions permettent de vérifier si les champs / variables sont vides ou nulles. Auquel cas, le message d'erreur qui suit s'affichera
	
	$InsertionOk = $pdoStat->execute(); //Ici on execute les instructions préparer

	if ($InsertionOk){ //Si l'instruction a été executée, nous sommes rediriger vers la page des médicaments

		header('Location:Médicaments.php');

	}
	else { // Si l'instruction n'a pas été executée un message d'erreur s'affiche
	?>

		<p class="errortext">
			<?php echo "Error: " . $sql . "<br>" . $conn->error;}?>
		</p>
		
	<?php	

}else{ //Si les champs n'ont pas été saisis un message d'erreur s'affiche
		?>

		<p class="errortext"> 
		<?php echo "Remplissez tous les champs.";?>  

<?php }?>
