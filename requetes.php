<?php

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
           // VALUES(:nom, :post_nom, :genre)'

    $request = $PDO->query('INSERT INTO $table(`nom`, `post_nom`,`genre`)
    VALUES(:nom, :post_nom, :genre)');

    $request->blindValue('nom',$identite['nom'] );
    $request->blindValue('post_nom',$identite['post_nom'] );
    $request->blindValue('genre',$identite['genre']);

    return $req;
}


?>