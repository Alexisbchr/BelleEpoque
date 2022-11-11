<?php

/**
 * This file contains all functions for the administration
 */
 
class AdminController extends AbstractController
{
	
	/**
	 * dashboard() is a function allowing the route and who verifies if user is log
	 */
	 
	public function dashboard()
	{
		if (isset($_SESSION['user']) && $_SESSION['user'] !== null)
		{
			$page = "dashboard";
			$pageName = "DashBoard";
			require_once './src/templates/admin/admlayout.phtml';
		}
		else
		{
			header('Location: login');
			exit;
		}
	}

	/**
	 *
	 *
	 *						COURS CRUD START
	 *
	 */

	/**
	 * addcours() is a function allowing the route and who verifies if user is log
	 * and recept/post form from "/admin/addcours"
	*/


	public function addcours()
	{

		if (isset($_SESSION['user']) && $_SESSION['user'] !== null)
		{
			// on vérifie que le formulaire est envoyé et que les champs sont remplis
			if (

				isset($_POST['titre']) && !empty($_POST['titre'])
				&& isset($_POST['compte']) && !empty($_POST['compte'])
				&& isset($_POST['mur']) && !empty($_POST['mur'])
				&& isset($_POST['niveau']) && !empty($_POST['niveau'])
				&& isset($_POST['choregraphe']) && !empty($_POST['choregraphe'])
				&& isset($_POST['musique']) && !empty($_POST['musique'])
				&& isset($_POST['lien']) && !empty($_POST['lien'])
				&& isset($_POST['pdf']) && !empty($_POST['pdf'])

			)
			{
				$titre = $this->clean_input($_POST["titre"]);
				$inputCompte = $this->clean_input($_POST["compte"]);
				$compte = intval($inputCompte);
				$inputMur = $this->clean_input($_POST["mur"]);
				$mur = intval($inputMur);
				$inputNiveau = $this->clean_input($_POST["niveau"]);
				$niveau = intval($inputNiveau);
				$choregraphe = $this->clean_input($_POST["choregraphe"]);
				$musique = $this->clean_input($_POST["musique"]);
				$lien = $this->clean_input($_POST["lien"]);
				$pdf = $this->clean_input($_POST["pdf"]);

				require_once './src/managers/CoursManager.php';
				$coursManager = new CoursManager();
				$cours = $coursManager->insertCours($titre, $compte, $mur, $niveau, $choregraphe, $musique, $lien, $pdf);
				header('Location: /BelleEpoque/admin/allcours');
				exit();
			}
			$page = "addcours";
			$pageName = "Ajouter un cours";
			require './src/templates/admin/admlayout.phtml';
		}
		else
		{
			header('Location: login');
			exit();
		}
	}

	/**
	 * singlecours() is a function allowing the route and who verifies if user is log
	 * and display a lesson by his ID
	 */

	public function singlecours(int $id)
	{
		if (isset($_SESSION['user']) && $_SESSION['user'] !== null)
		{
			$page = "singlecours";
			$pageName = "Consulter un cours";
			require_once './src/managers/CoursManager.php';
			$coursManager = new CoursManager;
			$cours = $coursManager->getCoursById($id);
			require_once './src/templates/admin/admlayout.phtml';
		}
		else
		{
			header('Location: login');
			exit();
		}
	}

	/**
	 * editcours() is a function allowing the route and who verifies if user is log
	 * and who can edit a lesson
	 */

	public function editcours(int $id)
	{

		if (isset($_SESSION['user']) && $_SESSION['user'] !== null)
		{
			require_once './src/managers/CoursManager.php';
			$coursManager = new CoursManager;
			$cours = $coursManager->getCoursById($id);

			if (

				isset($_POST['titre']) && !empty($_POST['titre'])
				&& isset($_POST['compte']) && !empty($_POST['compte'])
				&& isset($_POST['mur']) && !empty($_POST['mur'])
				&& isset($_POST['niveau']) && !empty($_POST['niveau'])
				&& isset($_POST['choregraphe']) && !empty($_POST['choregraphe'])
				&& isset($_POST['musique']) && !empty($_POST['musique'])
				&& isset($_POST['lien']) && !empty($_POST['lien'])
				&& isset($_POST['pdf']) && !empty($_POST['pdf'])

			){

				$titre = $this->clean_input($_POST["titre"]);
				$inputCompte = $this->clean_input($_POST["compte"]);
				$compte = intval($inputCompte);
				$inputMur = $this->clean_input($_POST["mur"]);
				$mur = intval($inputMur);
				$inputNiveau = $this->clean_input($_POST["niveau"]);
				$niveau = intval($inputNiveau);
				$choregraphe = $this->clean_input($_POST["choregraphe"]);
				$musique = $this->clean_input($_POST["musique"]);
				$lien = $this->clean_input($_POST["lien"]);
				$pdf = $this->clean_input($_POST["pdf"]);


				$coursManager = new CoursManager();
				$cours = $coursManager->editCours($id, $titre, $compte, $mur, $niveau, $choregraphe, $musique, $lien, $pdf);
				header('Location: /BelleEpoque/admin/allcours');
				exit;
			}

			$page = "editcours";
			$pageName = "Ajouter un cours";
			require_once './src/templates/admin/admlayout.phtml';
		}
		else
		{
			header('Location: login');
			exit();
		}
	}
	/**
	 * deletecours() is a function allowing the route and who verifies if user is log
	 * and who can delete a lesson
	 */

	public function deletecours(int $id)
	{
		if (isset($_SESSION['user']) && $_SESSION['user'] !== null)
		{
			$page = "deletecours";
			$pageName = "Supprimer un cours";
			require_once './src/managers/CoursManager.php';
			$coursManager = new CoursManager();
			$cours = $coursManager->deleteCoursById($id);
			require_once './src/templates/admin/admlayout.phtml';
			header('Location: /BelleEpoque/admin/allcours');
			exit;
		}
		else
		{
			header('Location: login');
			exit;
		}
	}
	/**
	 * deletecours() is a function allowing the route and who verifies if user is log
	 * and who can delete a lesson
	 */

	public function deleteimage(int $id)
	{
		if (isset($_SESSION['user']) && $_SESSION['user'] !== null)
		{
			$page = "deleteimage";
			$pageName = "Supprimer une image";
			require_once './src/managers/ImagesManager.php';
			$imagesManager = new ImagesManager;
			$images = $imagesManager->deleteImage($id);
			require_once './src/templates/admin/admlayout.phtml';
		}
		else
		{
			header('Location: login');
			exit;
		}
	}

	/**
	 * allcours() is a function allowing the route and who verifies if user is log
	 * and display all lesson of DataBase
	 */

	public function allcours()
	{
		if (isset($_SESSION['user']) && $_SESSION['user'] !== null)
		{
			$page = "allcours";
			$pageName = "Consulter les cours";
			require_once './src/managers/CoursManager.php';
			$coursManager = new CoursManager;
			$allCours = $coursManager->getAllCours();
			require_once './src/templates/admin/admlayout.phtml';
		}
		else
		{
			header('Location: login');
			exit;
		}
	}

	/**
	 * ordercours() is a function allowing the route and who sort lessons by letter
	 *
	 */

	public function ordercours()
	{
		if (isset($_SESSION['user']) && $_SESSION['user'] !== null)
		{
			$page = "ordercours";
			$pageName = "Trier les cours";
			require_once './src/managers/CoursManager.php';
			$coursManager = new CoursManager;
			$orderCoursByLetter = $coursManager->orderCoursByLetter();

			//Tri des cours dans une table adaptée (1ère lettre = clé)
			$coursByFirstLetter = [];
			$previousFirstLetter = null;
			$j = 0;
			for ($i = 0, $max = count($orderCoursByLetter);$i < $max;$i++)
			{
				$orderCoursByLetter[$i]['title'] . " Premier Char : " . strtoupper(substr($orderCoursByLetter[$i]['title'], 0, 1));
				$title = $orderCoursByLetter[$i]['title'];
				$id = $orderCoursByLetter[$i]['id'];
				$firstLetter = strtoupper(substr($orderCoursByLetter[$i]['title'], 0, 1));
				if ($firstLetter !== $previousFirstLetter)
				{
					$j = 0;
				}
				$coursByFirstLetter[$firstLetter][$j]['title'] = $title;
				$coursByFirstLetter[$firstLetter][$j]['id'] = $id;
				$previousFirstLetter = $firstLetter;
				$j++;
			}
			return $coursByFirstLetter;
		}
		else
		{
			header('Location: login');
			exit;
		}

	}

	/**
	 * orderbyletter() is a function allowing the route and display lessons by letter
	 *
	 */

	public function orderbyletter(string $letter)
	{
		if (isset($_SESSION['user']) && $_SESSION['user'] !== null)
		{
			$page = "ordercoursbyletter";
			$pageName = "Triage cours";
			require_once './src/managers/CoursManager.php';
			$coursByFirstLetter = $this->ordercours();
			require './src/templates/admin/admlayout.phtml';
		}
		else
		{
			header('Location: login');
			exit;
		}
	}

	/**
	 *
	 *
	 *						COURS CRUD end
	 *
	 */

	/**
	 *
	 *
	 *						GALERIE CRUD START
	 *
	 */

	public function galerie()
	{
		if(isset($_SESSION['user']) && $_SESSION['user'] !== null){
      $page = "galerie";
			$pageName = "Galerie de photo";
			require_once './src/managers/ImagesManager.php';
			$imagesManager = new ImagesManager;
			$images = $imagesManager->getDataImages();
			require_once "./src/templates/admin/admlayout.phtml";
    }
    else{
     header('Location: login');
     exit;
    }


	}
	public function editImage(int $id)
	{

		if (isset($_SESSION['user']) && $_SESSION['user'] !== null)
		{
			$page = "editimage";
			$pageName = "Ajouter un cours";
			require './src/managers/ImagesManager.php';
			$imagesManager = new ImagesManager;
			$images = $imagesManager->getImageById($id);
			if (isset($_POST['editphoto']))
			{
				$dataLiens = ['img_lien' => 'images/' . $_FILES['image']['name'], ];
				$dataFiles = ['img_file' => $_FILES['image']['tmp_name']];
				$lientab = ['img_lien' => $dataLiens['img_lien']];
				$dataLien = implode("", $dataLiens);
				$dataFile = implode("", $dataFiles);

				move_uploaded_file($dataFile, $dataLien);
				$lien = implode("", $lientab);
				$titletab = ['title' => htmlspecialchars($_POST['title']) , ];
				$title = implode("", $titletab);
				$id = $_POST['id'];
				$imagesManager = new ImagesManager();
				$images = $imagesManager->editimage($id, $title, $lien);

		    	header ('Location: /BelleEpoque/admin/galerie');

			}

			require_once './src/templates/admin/admlayout.phtml';
		}
		else
		{
			header('Location: login');
			exit;
		}

	}
	public function singleimage(int $id)
	{
		if (isset($_SESSION['user']) && $_SESSION['user'] !== null)
		{

			$page = "singleimage";
			$pageName = "Consulter un cours";
			require_once './src/managers/ImagesManager.php';

			$imagesManager = new ImagesManager;
			$image = $imagesManager->getImageById($id);
			require_once './src/templates/admin/admlayout.phtml';

			header ('Location: /BelleEpoque/admin/galerie');
		}
		else
		{
			header('Location: login');
			exit;
		}
	}
		public function deletePhoto(int $id)
	{
		if (isset($_SESSION['user']) && $_SESSION['user'] !== null)
		{

			$page = "deleteimage";
			$pageName = "Supprimer un cours";
			require_once './src/managers/ImagesManager.php';
			$imagesManager = new ImagesManager;
			$images = $imagesManager->deleteImage($id);
			require_once './src/templates/admin/admlayout.phtml';

			header ('Location: /BelleEpoque/admin/galerie');
		}
		else
		{
			header('Location: login');
			exit;
		}
	}
}

