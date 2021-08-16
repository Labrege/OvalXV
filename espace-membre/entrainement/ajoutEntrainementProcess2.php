<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/OvaleXV/includes/dbh.inc.php');


if(isset($_POST['submit'])){
    $tableauSection = array();
    foreach($_POST['arraySection'] as $titreSection){
        foreach($_POST['arrayEffectif'] as $effectifSection){
            $tableauSection[] = ['Titre Section ' => $titreSection, 'Effectif Section' => $effectifSection];
        }
    }
    print_r($tableauSection);
}