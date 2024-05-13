<?php 
include_once 'modele/Visiteur.php';
include_once 'modele/Gestion_Visiteur.php';
$GV=new Gestion_Visiteur();
$visiteurs=$GV->Lister();

switch($action)
{
 case "form_ajout": include_once('vue/visiteur/form_saisie.php');
                   break;
 case "form_edit": 
                   $V=$GV->Rechercher($id)[0];
                   include_once('vue/visiteur/form_edit.php');
                   break;
 case "ajouter":  $GV->Ajouter(new Visiteur(0,$_POST['nom'],$_POST['prenom'],$_POST['email']));
                   header('Location:../visiteur');
                   break;    
  case "modifier": $GV->Modifier(new Visiteur($_POST['id'],$_POST['nom'],$_POST['prenom'],$_POST['email']));
                  header('Location:../visiteur');
                   break;                                    
  case "supprimer": $GV->Supprimer($id);
                    header('Location:../../visiteur');
                   break;  
 default:  include_once('vue/visiteur/affichage.php'); 
}

?>