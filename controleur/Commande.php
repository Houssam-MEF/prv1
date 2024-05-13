<?php

include_once 'modele/Commande.php';
include_once 'modele/Gestion_Commande.php';
include_once 'modele/Gestion_Visiteur.php';
include_once 'modele/Gestion_Produit.php';

$GC = new Gestion_Commande();
$GV = new Gestion_Visiteur();
$GP = new Gestion_Produit();

$commandes = $GC->Lister();
$visiteurs = $GV->Lister();
$produits = $GP->Lister();

switch ($action)
{
    case "form_ajout":
        include_once('vue/commande/form_saisie.php');
        break;
    
    case "form_edit":
        $C = $GC->Rechercher($id)[0];
        include_once('vue/commande/form_edit.php');
        break;

    case "ajouter":
        [$id, $visiteur, $produit, $quantite] = [0, $_POST['visiteur'], $_POST['produit'], $_POST['quantite']];
        $GC->Ajouter(new Commande($id, $visiteur, $produit, $quantite));
        header('Location: ../commande');
        break;
        
    case "modifier":
        [$id, $visiteur, $produit, $quantite] = [$_POST['id'], $_POST['visiteur'], $_POST['produit'], $_POST['quantite']];
        $GC->Modifier(new Commande($id, $visiteur, $produit, $quantite));
        header('Location: ../commande');
        break;

    case "supprimer":
        $GC->Supprimer($id);
        header('Location: ../../commande');
        break;

    default :
        include_once('vue/commande/affichage.php');


}


