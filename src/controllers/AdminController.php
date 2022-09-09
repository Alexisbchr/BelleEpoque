<?php
/**
 * This file contains all functions for the administration
 */
class AdminController
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
		 * addcours() is a function allowing the route and who verifies if user is log
		 * and recept/post form from "/admin/addcours"
		 */
		public function addcours()
		{
				if (isset($_SESSION['user']) && $_SESSION['user'] !== null)
				{
						require_once './src/managers/CoursManager.php';
						if (isset($_POST['titre']) && isset($_POST['compte']) && isset($_POST['mur']) && isset($_POST['niveau']) && isset($_POST['choregraphe']) && isset($_POST['musique']))
						{
								$coursManager = new CoursManager();
								$cours = $coursManager->insertCours($_POST['titre'], $_POST['compte'], $_POST['mur'], $_POST['niveau'], $_POST['choregraphe'], $_POST['musique']);
								include './src/includes/_success.phtml';
						}
						$page = "addcours";
						$pageName = "Ajouter un cours";
						require_once './src/templates/admin/admlayout.phtml';
				}
				else
				{
						header('Location: login');
						exit;
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
						exit;
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
						if (isset($_POST['id']) && isset($_POST['title']) && isset($_POST['compte']) && isset($_POST['mur']) && isset($_POST['niveau']) && isset($_POST['choregraphe']) && isset($_POST['musique']) && isset($_POST['lien']) && isset($_POST['pdf']))
						{
								$coursManager = new CoursManager();
								$cours = $coursManager->editCours($_POST['title'], $_POST['compte'], $_POST['mur'], $_POST['niveau'], $_POST['choregraphe'], $_POST['musique'], $_POST['id'], $_POST['lien'], $_POST['pdf']);
								header('Location: /BelleEpoque/admin');
						}
						$page = "editcours";
						$pageName = "Ajouter un cours";
						require_once './src/templates/admin/admlayout.phtml';
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
		public function deletecours(int $id)
		{
				if (isset($_SESSION['user']) && $_SESSION['user'] !== null)
				{
						$page = "deletecours";
						$pageName = "Supprimer un cours";
						require_once './src/managers/CoursManager.php';
						$coursManager = new CoursManager;
						$cours = $coursManager->deleteCoursById($id);
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
		public function galerie()
		{
				$page = "galerie";
				$pageName = "Galerie de photo";
				require_once './src/managers/ImagesManager.php';
				$imagesManager = new ImagesManager;
				$images = $imagesManager->getDataImages();
				require_once "./src/templates/admin/admlayout.phtml";

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

								var_dump($lien);
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
				}
				else
				{
						header('Location: login');
						exit;
				}
		}
}

