
<!DOCTYPE html>
<html>
 <head>
 <meta charset="UTF-8">
 <title></title>
 </head>
<body>
 <?php
                include_once 'boostrap.inc.php';

                 $v = new Ville();
                 $v = Ville::fetch('PA');
                 var_dump($v);


                $utilisateur = new Utilisateur();//initialisation d'un objet de type Categorie
                $utilisateur->setGenre("P");
                $utilisateur->setTelephone("5454");
                $utilisateur->setEmail("gfgfgfgf");
                $utilisateur->setAdresseRue("fgfdfd");
                $utilisateur->setAdressePostal("gfgfgfggh");
                $utilisateur->setPrenom("fgf");
                $utilisateur->setNom("gfgfg");
                $utilisateur->setMotDePasse("fdfddf");

                $utilisateur->setAdresseVille($v);
                $utilisateur->save();
       ?>
 </body>