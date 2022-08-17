<?php
   if(isset($_GET['action']) && !empty($_GET('action') && $_GET['action'] == 'connecter'))
   {
        header('Location: connecte.php');       
   }
    if(isset($_GET['action']) && !empty($_GET('action') && $_GET['action'] == 'supprimer'))
   {
        header('Location: supprimer.php');       
   }

   $mois = ["janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet",
            "Aout","Septembre", "Octobre", "Novembre", "Decembre" ]; 

   $lieu_naissance = ["","LUBUMBASHI", "LIKASI", "KOLWEZI", "KINSHASA", "GOMA", "KINDU",
                        "MATADI", "BOMA"];

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>
<body>

    <form method="post" action = "connecte.php">
        <p>
            <label for="nom">Nom</label>
            <input type="text" name="user_name">
        </p>

        <p>
            <label for="post-nom">Post-nom</label>
            <input type="text" name="user_family_name">
        </p>

        <p>
            <label for="">Genre</label>

            <label for="genre-masculin">M</label>
            <input type="radio" name="sexe" id="genre-masculin" value = 1>

            <label for="genre-feminin">F</label>
            <input type="radio" name="sexe" id="genre-feminin" value = 0>
        </p>

        <p>
            <table>
                <tr>
                    <td>Naissaance</td>
                    <td> <select name="jour" id="jour">
                        <?php for($i = 1; $i <=31; $i++):?>
                        <option><?php echo $i; ?></option>
                        <?php endfor ?>
                        </select>
                    </td>
                    <td> <select name="mois" id="mois" aria-placeholder="mois">
                        <?php foreach($mois as $mois):?>
                        <option><?php echo $mois; ?></option>
                        <?php endforeach ?>
                        </select>
                    </td>
                    <td> 
                    <select name="annee" id="annee  ">
                        <?php for($i = 1995; $i <=2022; $i++):?>
                        <option><?php echo $i ?></option>
                        <?php endfor ?>
                        </select>
                    </td>
                </tr>
            </table>
        </p>

        <p>
            <label for="lieu_naissance">Lieu de naissance</label>
            <select name="lieu_naissance" id="lieu">
                <?php foreach($lieu_naissance as $lieu):?>
                <Option><?php echo $lieu;?></Option>
                <?php endforeach ?>
            </select>
        </p>

        <p>
            <input type = "submit" name = "envoie" id = "formulaire" value = "Enregistré">
            <input type = "reset" name = "reinitialisation" value = "reinitialisé">
        </p>
    </form>
</body>
</html>