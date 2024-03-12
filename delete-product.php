<?php
include("./autoload.php");

use DbConnexion\DbConnexion;
use ProductManager\ProductManager;


// J'ai passé dans l'url , l'id du produit a supprimer, via le lien
if(isset($_GET["id"])){

    // Instance de connexion
$dbConnexion = new DbConnexion();
// instance du manager de produit pour utiliser les fonctions
$manager = new ProductManager($dbConnexion);


// Je récupère l'id passé dans le lien pour le passer à ma fonction deleteProduct
  if ($manager->deleteProduct($_GET["id"])) {
        header("Location:index.php");
        echo "success";
    } else {
        var_dump('tu as fauter');
    }
}