<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <?php
        require_once 'library/YouTube.php';
require_once 'library/ClientLogin.php';

// configuration et identifiants
$authenticationURL = 'https://www.google.com/youtube/accounts/ClientLogin';
$developerKey = 'AI39si7RP5Dmk0ZQJ7JcMwwRwV2zd6j10_d1JTjQsxKVQTG51rkYW0tcRuSCoJpiJJxvODYeidlD8Rwmb9RTIUAy7siRAhstCw'; // Clé développeur
$applicationId = 'ytapi-XXXXXXXXXX'; // Identifiant de l'application
$clientId = 'ytapi-YYYYYYYYYYY'; // Identifiant Client
$username = "login"; // Login de votre compte YouTube
$password = "pass"; // Mot de passe de votre compte YouTube

// authentification via la méthode HTTP
$httpClient = Zend_Gdata_ClientLogin::getHttpClient(
    $username,$password,'youtube',null,'MonSiteWeb',null,null,$authenticationURL
);

$yt = new Zend_Gdata_YouTube($httpClient, $applicationId, $clientId, $developerKey);
?>
<?php
// Page sur laquelle sera renvoyé l'utilisateur après la validation 
// du formulaire (URL de retour)
$nextUrl = 'http://gdata.youtube.com/action/GetUploadToken';
$postUrl = 'http://youtube.com/action/GetUploadToken';
// Affichage du formulaire
$form = '<form action="'. htmlspecialchars($postUrl, ENT_QUOTES) .'?nexturl='
. urlencode($nextUrl) . ' method="post" enctype="multipart/formdata">
Fichier vidéo : <input name="file" type="file"/>
<input name="token" type="hidden" value="'. $tokenValue .'"/>
<input value="Envoyer la vidéo" type="submit" />
</form>';

echo $form;

?>
    </body>
</html>
