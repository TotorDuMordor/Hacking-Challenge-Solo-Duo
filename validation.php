<?php
mysql_connect("localhost", "root", "");
mysql_select_db("nom_db");
$quete = mysql_query("SELECT * FROM validation");

while($validation = mysql_fetch_array($quete))
{
echo 'Pseudo: ';
echo $validation['pseudo'];
echo ' E-mail: ';
echo $validation['email'];

if(isset($_GET['action']) AND isset($_GET['id']))
{
$action = $_GET['action'];
if($action == "accepter")
{
    echo '<a href="validation.php?action=accepter&id='.$validation['id'].'">Accepter</a>';
}
elseif($action == "refuser")
{
    echo '<a href="validation.php?action=refuser&id='.$validation['id'].'">Refuser</a>';
}
echo '<br/>';

?>
