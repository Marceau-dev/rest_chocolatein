<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

include_once("Url.php");
include_once("Controle.php");

// Création des objets nécessaires
$url = Url::getInstance();
$controle = new Controle();

// Vérification de l'authentification
if (!$url->authentification()) {
    $controle->unauthorized();
} else {
    // Récupération de la méthode HTTP
    $methodeHTTP = $url->recupMethodeHTTP();

    // Récupération des variables de l'URL
    $table = $url->recupVariable("table");
    $id = $url->recupVariable("id");
    $champs = $url->recupVariable("champs", "json");

    // Envoi de la demande au contrôleur
    $controle->demande($methodeHTTP, $table, $id, $champs);
}