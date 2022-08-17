<?php

if(isset($_GET['action']) && !empty($_GET('action') && $_GET['action'] == 'acceuil'))
{
    header('Location: index.php');       
}
/*
$identite = [
    "nom" => $_POST['user_name'],
    "post_nom" => $_POST['user_family_name'],
    "genre" => ($_POST['sexe'])?'M':'F',
    "date_naissance" => $_POST['jour'].'-'.$_POST['mois'].'-'.$_POST['annee']
]; */

function mois():string
{
    switch($_POST['mois'])
    {
        case("janvier"):
            $mois = "01";
            break;

        case("fevrier"):
            $mois = "02";
            break;

        case("mars"):
            $mois = "03"; 
            break;
            
        case("avril"):
            $mois = "04";
            break;

        case("mai"):
            $mois = "05"; 
            break;

        case("juin"):
            $mois = "06"; 
            break;

        case("juillet"):
            $mois = "07";
            break;

        case("aout"):
            $mois = "08" ;
            break;

        case("septembre"):
            $mois = "09";
            break;

        case("octobre"):
            $mois = "10";
            break;

         case("novembre"):
            $mois = "11"; 
            break;

        case("decembre"):
            $mois = "12" ; 
            break;
       default:
            $mois = "00";
            break;
    }

    return $mois;
}
$mois = mois();

$DB_DSN = 'mysql:host=localhost;dbname=essaie';
$DB_USER ='root';
$DB_PASS = '';

$option =[
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];

try
{
    $DB = new PDO($DB_DSN, $DB_USER, $DB_PASS, $option);

    $insert_query = $DB->prepare('DELETE FROM `personne` WHERE :nom');

   
    $insert_query->execute(['nom'=>'KABEMBA']); 

    $request = $DB->query('SELECT * FROM `Personne`');
    while($req = $request->fetch(PDO::FETCH_ASSOC))
    {
        echo '<pre>';
        print_r ($req);
        echo '<pre>';
    }

}
catch(PDOException $e)
{
    echo 'ERREUR; '.$e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connecter</title>
</head>
<body>
    <h1>Bonjour ! <?php echo $_POST['user_name']." ".($_POST["user_family_name"]) ?></h1>
    <h2>Voila quelques information sur vous:</h2>
    <ul>
        <li>Lieu de naissance <?php echo $_POST['lieu_naissance'] ?></li>
        <li>Date de naissance <?php echo $_POST['jour'].' '.$_POST['mois'].' '.$_POST['annee'] ?></li>
        <li>Genre <?php echo ($_POST['sexe'])?"masculin":"feminin"; ?>  </li>
    </ul>
    <a href="index.php?action = acceuil">Retour</a>
</body>
</html>