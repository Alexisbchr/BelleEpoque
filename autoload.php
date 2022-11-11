<?php
// Notre fichier autoload.php que nous plaçons à la racine du projet va nous
// permettre de faire deux choses :
// faire des require des controllers et du routeur
// charger la liste des routes depuis notre fichier de configuration
require "./src/services/Router.php";

require './src/managers/AbstractManager.php';

require "./src/controllers/AbstractController.php";
require "./src/controllers/HomeController.php";
require "./src/controllers/AuthentificationController.php";
require "./src/controllers/AdminController.php";
require "./src/controllers/CoursController.php";
require './src/controllers/PageController.php';
require './src/controllers/ContactController.php';
require './src/controllers/ImagesController.php';


$routes = [];

// Read the routes config file
$handle = fopen("config/routes.txt", "r");

if ($handle) { // if the file exists

    while (($line = fgets($handle)) !== false) { // read it line by line

        $route = []; // each route is an array

        $routeData = explode(" ", str_replace(PHP_EOL, '', $line)); // divide the line in two strings (cut at the " ")

        $route["path"] = $routeData[0]; // the path is what was before the " "

        if(substr_count($route["path"], "/") > 1) // check if the path string has more than 1 "/"
        {
            if(substr($route["path"],-1)=="*") // check if the last char of the path is "*", which represents a parameter
            {

                $route["parameter"] = true; // the route expects a parameter
                $pathData = explode("/", $route["path"]); // divide the path in three strings (cut at the "/")
                $route["path"] = substr($route["path"], 0, -2); // isolate the path without the parameters

            }
            else
            {
                $route["parameter"] = false;
            }
        }
        else
        {
            $route["parameter"] = false; // the route does not expect a parameter
        }

        $controllerString = $routeData[1]; // the controller string is what was after the " ";

        $controllerData = explode(":", $controllerString); // divide the controller string in two strings (cut at the ":")

        $route["controller"] = $controllerData[0]; // the controller is what was before the ":"

        $route["method"] = $controllerData[1]; // the method is what was after the ":"

        $routes[] = $route; // add the new route to the routes array
    }

    fclose($handle); // close the file
}
// $routes = [];

// // lire les routes du fichier config
// $handle = fopen("./config/routes.txt", "r");

// if ($handle) { // si le fichier existe

//     while (($line = fgets($handle)) !== false) { // si le fichier existe
//         // chaque route est un tableau
//         $route = [];
//         // diviser la ligne en deux string (division à partir des " ")
//         $routeData = explode(" ", str_replace(PHP_EOL, '', $line));
//         // le chemin est ce qui est avant le ""
//         $route["path"] = $routeData[0];
//         // on vérifie si la chaine du chemin a plus de 1 /
//         if(substr_count($route["path"], "/") > 1)
//         {
//             // la route a besoin d'un paramètre
//             $route["parameter"] = true;
//             // on divise la route en 3 strings (a partir de "/" )
//             $pathData = explode("/", $route["path"]);
//             // on isole la route sans le paramètre
//             $route["path"] = "/".$pathData[1];
//         }
//         else
//         {
//             // la route n'a pas besoin de paramètre
//             $route["parameter"] = false;
//         }
//         // la string du controller est ce qu'il y a apres ";"
//         $controllerString = $routeData[1];
//         // on divise la string du controller en deux string (à partir du ":")
//         $controllerData = explode(":", $controllerString);
//         // le controller est ce qu'il y a avant le ":"
//         $route["controller"] = $controllerData[0];
//         // la méthode est ce qu'il y a après le ":"
//         $route["method"] = $controllerData[1];
//         // ajoute la nouvelle route au tableau des routes
//         $routes[] = $route;
//     }
//     // on ferme le fichier
//     fclose($handle);
// }