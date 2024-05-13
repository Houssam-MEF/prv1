
<center>
<h1>la liste des produits</h1>
<table border="1" width="430">
    <tr>
        <th>ID</th>
        <th>Liebelle</th>
        <th>Prix</th>
        <th>Stock</th>
        <th colspan="2"><a href="produit/form_ajout">Ajouter</a></th>
    </tr>
<?php
foreach($produits as $P)
{
?>
    <tr>
        <td><?=$P[0]?></td>
        <td><?=$P[1]?></td>
        <td><?=$P[2]?></td>
        <td><?=$P[3]?></td>
        <td><a href="produit/supprimer/<?=$P[0]?>">Sup</a></td>
        <td><a href="produit/form_edit/<?=$P[0]?>">Edit</a></td>
    </tr>
<?php
}
?>
</table>
</center>