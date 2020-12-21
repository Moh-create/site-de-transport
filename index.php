
<!DOCTYPE html>
<html>
 <head>
 <meta charset="UTF-8">
 <title></title>
 </head>
<body>
 <?php
                include_once 'boostrap.inc.php';
                
                $p = new PointRelais();
                $p->setNom("train");
                $p->setAdresseRue("gfgfgf");
                $p->setAdresseVille("Paris");
                $p->setAdresseCodePostal("75000");
                $v = new Pays();
                $v = Pays::fetch("FR");
                $p->setPays($v);
                $p->save();
                
       ?>
 </body>