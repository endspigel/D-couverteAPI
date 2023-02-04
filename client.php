<html>
	<head><title>Calculatrice</title></head>
	<body>
		<?php
			// Initialisation des variables
			$nb1 = 0;
			$nb2 = 0;
			$resultat = 0;
			
			// Cas où le formulaire a été validé par l'utilisateur
			if (isset($_POST['op']) && (!empty($_POST['op']))) {
				if (isset($_POST['nb1']) && (!empty($_POST['nb1'])) && isset($_POST['nb2']) && (!empty($_POST['nb2']))) {
					$nb1 = htmlentities($_POST['nb1']);
					$nb2 = htmlentities($_POST['nb2']);
					$a = $nb1;
                    $b = $nb2;
					require_once('calculator.php');
					switch (htmlentities($_POST['op'])) {
						case "Multiplier" :
                            $resultat = $result[paramOut];
							break;
						// Traitement des autres opérations réalisées
						// par votre calculatrice
					}
				}
			}
		?>

		<!-- Affichage du formulaire -->
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<fieldset>
				<legend><b>Calculatrice en ligne</b></legend>
					Nombre 1 : <input type="text" name="nb1" value="<?php echo $nb1; ?>"/><br/>
					Nombre 2 : <input type="text" name="nb2" value="<?php echo $nb2; ?>"/><br/>
					R&eacute;sultat : <input disabled="disabled" type="text" value="<?php echo $resultat; ?>"/><br/>
					Op&eacute;rateur
					<input type="submit" name="op" value="Multiplier"/>
					<input type="submit" name="op" value="Additionner"/>
					<!-- Insertion des différents boutons permettant de
					réaliser une opération de calcul -->
					<input type="reset" value="Vider"/>
			</fieldset>
		</form>
	</body>
</html>



<?php
/*
/// Masquage des "warnings"
    ini_set( "display_errors", 0); 

/// Utilisation de la bibliothèque NuSOAP
    require_once("nusoap.php") ;

/// Création et initialisation du client SOAP
	$clientWS = new nusoap_client('http://localhost/R401/serveur.php');//url de tout en bas du fichier xml
	$error = $clientWS->getError();
	if ($error)
		die ("Une erreur s'est produite lors de la création du client SOAP...");

/// Initialisation des attributs de l'enveloppe de la requête SOAP
	$clientWS->namespaces = array('SOAP-ENV' => 'http://localhost/R401/serveur.php', 'ns1' => 'http://tempuri.org/');//espace_nommage_service doit être remplacé par le lien du haut du fichier

/// Initialisation du corps de la requête SOAP
	$body = "<ns1:Multiply>".
				"<ns1:intA>2</ns1:intA>".
				"<ns1:intB>5</ns1:intB>".
			"</ns1:Multiply>";

/// Invocation de la méthode
	$result = $clientWS->call('nom_methode', $body, '', 'http://localhost/R401/serveur.php/Multiply', false, null, 'document', 'literal');
	if ($clientWS->fault)
		die ("Une erreur s'est produite lors de l'appel de la méthode…");

/// Affichage de la requête et de la réponse SOAP
    echo "Request<pre>".htmlspecialchars($clientWS->request)."</pre>";
    echo "Response<pre>".htmlspecialchars($clientWS->response)."</pre>";

/// Affichage des résultats
	echo "<pre>"; print_r($result); echo "</pre>";
    */
?>