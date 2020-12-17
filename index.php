
<!DOCTYPE html>
<html>
 <head>
 <meta charset="UTF-8">
 <title></title>
 </head>
<body>
 <?php
      
                 include_once 'boostrap.inc.php';

                 $pays = new Pays();//initialisation d'un objet de type Categorie
                $pays->setCodePays("AL");
                 $pays->setNomPays("Allemagne");
                 $pays->save() ;//Sauvegarde de l'objet
                 var_dump($pays);


                // $ville = new Ville();
                // $ville->setCodeVille("BA");
                // $ville->setNomVille("Barcelone");
                // $ville->setPays($pays);
                //  $ville->save();

 ?>
 </body>