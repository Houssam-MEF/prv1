<?php

include_once 'modele/Produit.php';
include_once 'modele/Gestion_Produit.php';

$GP = new Gestion_Produit();
$produits = $GP->Lister();

switch ($action)
{
    case "form_ajout":
        include_once('vue/produit/form_saisie.php');
        break;
    
    case "form_edit":
        $P=$GP->Rechercher($id)[0];
        include_once('vue/produit/form_edit.php');
        break;

    case "ajouter":
        [$id, $libelle, $prix, $stock] = [0, $_POST['libelle'], $_POST['prix'], $_POST['stock']];
        $GP->Ajouter(new Produit($id, $libelle, $prix, $stock));
        header('Location: ../produit');
        break;
        
    case "modifier":
        [$id, $libelle, $prix, $stock] = [$_POST['id'], $_POST['libelle'], $_POST['prix'], $_POST['stock']];
        $GP->Modifier(new Produit($id, $libelle, $prix, $stock));
        header('Location: ../produit');
        break;

    case "supprimer":
        $GP->Supprimer($id);
        header('Location: ../../produit');
        break;

    default :
        include_once('vue/produit/affichage.php');


}


