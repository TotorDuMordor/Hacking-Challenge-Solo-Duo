<?php
mysql_connect("localhost", "root", "");
mysql_select_db("promo");
$quete = mysql_query("SELECT * FROM validation");
while($validation = mysql_fetch_array($quete))
{
echo 'Pseudo: ';
echo $validation['pseudo'];
echo ' Mot de passe: ';
echo $validation['passe'];
echo ' E-mail: ';
echo $validation['email'];
echo '<a href="validation.php?action=accepter&id='.$validation['id'].'">Accepter</a>';
echo '<a href="validation.php?action=refuser&id='.$validation['id'].'">Refuser</a>';
echo '<br/>';
}
 
if(isset($_GET['action']) AND isset($_GET['id']))
{
$action = $_GET['action'];
if($action == "accepter")
{
$id = $_GET['id'];
$quete2 = mysql_query("SELECT * FROM validation WHERE id='$id'");
$connexion = mysql_fetch_array($quete2);
$pseudo = $connexion['pseudo'];
$passe = $connexion['passe'];
$email = $connexion['email'];
mysql_query("INSERT INTO connexion VALUES('$id', '$pseudo', '$passe', '$email')");
mysql_query("DELETE FROM validation WHERE id='$id'");

$passe = sha1($passe);
}
elseif($action == "refuser")
{
$id = $_GET['id'];
mysql_query("DELETE FROM validation WHERE id='$id'");
}
}
?>


