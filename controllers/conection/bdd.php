<?php
try
{
	$bdd = new PDO("mysql:host=localhost;dbname=id13686875_promesa;charset=utf8", "id13686875_root", "V~QC7lJBP=3ZDLYG");
	//$bdd = new PDO("mysql:host=localhost;dbname=PROMESA;charset=utf8", "root", "");
}
catch(Exception $e)
{
    die('Error : '.$e->getMessage());
}
?>