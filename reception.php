<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=ti_labs', 'root', '');


$maxsize = 1048576;
$maxwidth = 1048576;
$maxheight = 1048576;

if ($_FILES['photoP']['error'] > 0) $erreur = "Erreur lors du transfert";


if ($_FILES['photoP']['size'] > $maxsize) $erreur = "Le fichier est trop gros";


$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
//1. strrchr renvoie l'extension avec le point (« . »).
//2. substr(chaine,1) ignore le premier caractère de chaine.
//3. strtolower met l'extension en minuscules.
$extension_upload = strtolower(  substr(  strrchr($_FILES['photoP']['name'], '.')  ,1)  );
if ( in_array($extension_upload,$extensions_valides) ) echo "Extension correcte";


$image_sizes = getimagesize($_FILES['photoP']['tmp_name']);

if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight) $erreur = "Image trop grande";

$test = $_SESSION['idU'];
if(file_exists('fichier/1/') == FALSE) mkdir('fichier/1/', 0733, true);
$nom = md5(uniqid(rand(), true));


$nom = "fichier/1/{$_SESSION['idU']}.{$extension_upload}";
$resultat = move_uploaded_file($_FILES['photoP']['tmp_name'],$nom);
if ($resultat) echo "Transfert réussi";
?>