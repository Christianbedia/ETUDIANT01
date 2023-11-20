
<?php
     // Online PHP compiler to run PHP program online
// Print "Hello World!" message

//$nom= nom;
//echo "Hello World!";
//var_dump($_POST);
$servername="localhost";
$username="root";
$password="root";
$dbname="ETUDIANT01";


try {
   $conn = new PDO("mysql:host=$servername;dbname=$dbname",$password);
   $conn->setAttribute (PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   //echo"la connexion a ete bien etablie";
}
catch(PDOException $e){
   echo "la connexion a echoue:".$e->getmessage();
}


if(isset($_POST['envoyer']))
{
   $nom =$_POST['nom'];
   $prenom=$_POST['prenom'];
   $age =$_POST['age'];
   $adresse=$_POST['adresse'];

   $sql =("INSERT INTO `etude`(`NOM`, `PRENOM`, `ADRESSE`, `AGE`) VALUES (:nom,:prenom,:age ,:adresse)");
   $stml = $conn->prepare($sql);

   $stml->bindparam(':nom',$nom);
   $stml->bindparam(':prenom',$prenom);
   $stml->bindparam(':age',$age);
   $stml->bindparam(':adresse',$adresse);

   $stml->execute();
   //pour changer deux ou plus dans une seule fois clique sur ctrl +d 
}

?>
   <DOCTYPE html>
    <html lang="en">
     <head>
        <meta charset="UTF-8">
        <meta http-equiv="x-UA-compatible"content="IE-edge">
        <meta name ="viewport"content="width=device-width,initial-scale=1;0">
        <meta rel="stylesheet" href="style.css">
        <title>formulaire</title>
     </head>
     <body>
       
    <h1>envoyer les données du formulaire vers mysql</h1>
    
     <form action=""method="post">
        <label for="">nom:</label>
        <input type="text" name="nom">
        <label for="">prenom:</label>
        <input type="text" name="prenom">
        <label for="">age:</label> 
        <input type="text" name="age">
        <label for="">adresse:</label>
        <input type="text" name="adresse">
        <input type="submit" value="envoyer" name="envoyer">
        </form>
    
    </body>
    </html> 
   
    