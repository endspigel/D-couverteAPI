<?php

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
	$clientWS->namespaces = array('SOAP-ENV' => 'http://schemas.xmlsoap.org/soap/envelope/', 'ns1' => 'http://localhost/R401/serveur.php');//espace_nommage_service doit être remplacé par le lien du haut du fichier

/// Initialisation du corps de la requête SOAP
	$body = "<ns1:Multiply>".
				"<ns1:intA>$a</ns1:intA>".
				"<ns1:intB>$b</ns1:intB>".
			"</ns1:Multiply>";

/// Invocation de la méthode
	$result = $clientWS->call('Multiply', $body, '', 'http://localhost/R401/serveur.php/', false, null, 'document', 'literal');
	if ($clientWS->fault)
		die ("Une erreur s'est produite lors de l'appel de la méthode…");

/// Affichage de la requête et de la réponse SOAP
    //echo "Request<pre>".htmlspecialchars($clientWS->request)."</pre>";
    //echo "Response<pre>".htmlspecialchars($clientWS->response)."</pre>";

/// Affichage des résultats
	//print_r($result);
?>