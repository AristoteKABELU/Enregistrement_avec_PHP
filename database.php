<?php

$DB_DSN = 'mysql:host=localhost;dbname=essaie';
$DB_USER ='root';
$DB_PASS = '';
try
{
    $DB = new PDO($DB_DSN, $DB_USER, $DB_PASS);  
    
    function creation_table(string $nom):string
    {
        $req = 'CREATE TABLE IF NOT EXISTS '.$nom.'(
                `id` INT AUTO_INCREMENT,
                `nom` VARCHAR(30),
                `post_nom` VARCHAR(30),
                `genre` CHAR(1),
                `date_naissance` DATE,
                PRIMARY KEY(`id`)';

        return $req;
    }

    function insertion($table, array $identite):string
    {
        // $req = 'INSERT INTO $table(`nom`, `post_nom`,`genre`)
        // VALUES(:nom, :post_nom, :genre)

        $request = $DB->query('INSERT INTO $table(`nom`, `post_nom`,`genre`)
        VALUES(:nom, :post_nom, :genre)');

        /*
        $request->blindValue('nom',$identite['nom'] );
        $re
        $quest->blindValue('post_nom',$identite['post_nom'] );
        $request->blindValue('genre',$identite['genre']);
        */

        return $req;
    }

    $DB->query(creation_table('Personne'));


    function select($table):void
    {
        $req = $PDO->prepare('SELECT * FROM $table');
        
        while($personne = $req->fetch($PDO::FECTH_ASSOC))
        {
            echo $personne;
        }

    }


    select('Personne');
    
}
catch(PDOException $e)
{
    echo 'ERREUR; '.$e->getMessage();
}
?>