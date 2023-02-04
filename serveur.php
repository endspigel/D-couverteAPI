<?php

/// Masquage des "warnings"
    ini_set( "display_errors", 0); 

/// Utilisation de la bibliothèque NuSOAP
	require_once ("nusoap.php");

/// Implémentation d’une méthode du service
	function Multiply($param1, $param2) {
		return $param1 * $param2;
	}

/// Création du service SOAP
	$serverWS = new soap_server();
	
/// Configuration et génération du fichier WSDL
	$serverWS->configureWSDL('calculator', 'http://localhost/R401/serveur.php');
	$serverWS->wsdl->schemaTargetNamespace="http://localhost/R401/serveur.php?wsdl";

/// Enregistrement d’une méthode
	$serverWS->register('Multiply',
				array('paramIn1' => 'xsd:int', 'paramIn2' => 'xsd:int'),
				array('paramOut' => 'xsd:int'),
				'https://localhost/R401',
				false,
				false,
				'literal',
				'Multiply permet de calculer le produit entre deux nombres');

/// Lancement du processus serveur
	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
	$serverWS->service(file_get_contents("php://input"));
	exit();

?>