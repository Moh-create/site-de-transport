<!DOCTYPE html>
<html>
 <head>
 <meta charset="UTF-8">
 <title></title>
 </head>
 <body>
 <table border="1" width="80%" align="center">
 <?php
 include_once 'boostrap.inc.php';
 $produits = Pays::fetchAll();
 var_dump($produits);
 foreach ($produits as $unProduit):
 ?>
 <tr>
 <td>
 <?php echo $unProduit->getCodePays(); ?>
 </td>
<td>
 <?php echo $unProduit->getNomPays(); ?>
 </td>
 </tr>
 <?php endforeach; ?>
 </table>
 </body