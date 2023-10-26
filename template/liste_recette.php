<?php
    include_once("connexion.php");
    $reponse = $bdd->query('SELECT titre, rec_resume from RECETTE ORDER BY date_modification DESC LIMIT 0, 10;');

    echo '<table>';
    while ($donnees = $reponse->fetch()){ 
        echo '<tr> <td>' . $donnees['titre'] . '<td/><td>' . $donnees['rec_resume']  . '<td/><tr/>';
        echo '<br>';
    }
    echo '<table/>';

    $donnees_tests = array();
    $donnees_tests[1]['titre']= 'un titre';
    $donnees_tests[1]['rec_resume']= 'un resume';
    $donnees_tests[2]['titre']= 'deux titres';
    $donnees_tests[2]['rec_resume']= 'deux resume';

    echo '<table>';
    for($i = 1; $i < count($donnees_tests) + 1; $i++){
        echo '<tr> <td> <a href = "https://dev-rekai221.users.info.unicaen.fr/PtiCuisto/template/liste_recette.php">' . $donnees_tests[$i]['titre'] . '</a><td/><td>' . $donnees_tests[$i]['rec_resume']  . '<td/><tr/>';
        echo '<br>';
    }
    echo '<table/>';
?>