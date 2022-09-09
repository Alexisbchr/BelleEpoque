<?php

/**
* This file contains all functions for CRUD lesson
*/

require './src/entities/Cours.php';

class CoursManager
{
		private PDO $db;

		/**
		 * @param PDO $db
		 */
		public function __construct()
		{
				$this->db = new PDO(
				'mysql:host=db.3wa.io;port=3306;dbname=beucheralexis_belle_epoque',
				'beucheralexis',
				'6e8483129fd777c045a2009608fa54d9'
				);
		}

		/**
		 * @return PDO
		 */
		public function getDb(): string
		{
				return $this->db;
		}

		/**
		 * @param string $db
		 */
		public function setDb(PDO $db): void
		{
				$this->db = $db;
		}
		
		// Récuperer tous les cours par ID
		
		public function getCoursById(int $id) : Cours 
		{
				$db=$this->db;
				$query = $db->prepare('SELECT * FROM cours WHERE id=:id');
				$parameters = [
				'id' => $id
				];
				$query->execute($parameters);
				$cour = $query->fetchAll(PDO::FETCH_ASSOC);
				$coursById = new Cours($cour[0]['id'], $cour[0]['title'], 
				$cour[0]['compte'],$cour[0]['mur'], $cour[0]['niveau'], 
				$cour[0]['choregraphe'], $cour[0]['musique'], $cour[0]['lien'], $cour[0]['pdf']);
				return $coursById;
				
		}
		
		// Récuperer les tous les cours 
		
		public function getAllCours() : array 
		{
				$db=$this->db;
				$query = $db->prepare('SELECT * FROM cours');
				$query->execute();
				$allCours = $query->fetchAll(PDO::FETCH_ASSOC);
				return $allCours;
		}
		// Récuperer les tous les cours par la premiere lettre du titre
		
		public function orderCoursByLetter() : array 
		{
				$db=$this->db;
				$query = $db->prepare('SELECT * FROM cours ORDER BY cours.title');
				$query->execute();
				$orderCoursByLetter = $query->fetchAll(PDO::FETCH_ASSOC);
			
				return $orderCoursByLetter;
		}
		
		// Récuperer les 4 derniers cours 
		
		public function getLastCours() : array
		{
				$db=$this->db;
				$query = $db->prepare
				('SELECT * FROM `cours`  
					ORDER BY `cours`.`id`  DESC
					LIMIT 4'
				);
				$query->execute();
				$lastCours = $query->fetchAll(PDO::FETCH_ASSOC);
				return $lastCours;  
		}
		
		// Inserer un cours dans la base de donnée
		
		public function insertCours(string $title, int $compte, int $mur, 
		string $niveau, string $choregraphe, string $musique, string $lien, string $pdf)
		{
			$db=$this->db;
			$query = $db->prepare('INSERT INTO `cours`(`title`, `compte`, `mur`, 
				`niveau`, `choregraphe`, `musique`, `lien`, `pdf`) 
				VALUES (:title,:compte, :mur, :niveau, :choregraphe, :musique, :lien, :pdf)');
			$parameters = [
				'title' => $title,
				'compte' => $compte,
				'mur' => $mur,
				'niveau' => $niveau,
				'choregraphe' => $choregraphe,
				'musique' => $musique,
				'lien' => $lien,
				'pdf' => $pdf
			];
			$query->execute($parameters);
		}
		
		// Editer un cours
		
		public function editCours(string $title, int $compte, int $mur, 
		string $niveau, string $choregraphe, string $musique, int $id, string $lien, string $pdf)
		{
			try {
				
				$db=$this->db;
				$query = $db->prepare(
				'UPDATE cours SET title=:title, compte=:compte, mur=:mur, niveau=:niveau,
				choregraphe=:choregraphe, musique=:musique, id=:id, lien=:lien, pdf=:pdf WHERE id=:id');
				$parameters = [
					'title' => $title,
					'compte' => $compte,
					'mur' => $mur,
					'niveau' => $niveau,
					'choregraphe' => $choregraphe,
					'musique' => $musique,
					'id' => $id,
					'lien' => $lien,
					'pdf' => $pdf
				];
				$query->execute($parameters);
				header('Location: admin');    
			}
			catch(Exception $e)
			{
				echo $e->getMessage() . "<br>";
			}
		}
		
		// Supprimer un cours par son id
		
		public function deleteCoursById(int $id)
		{
			$db=$this->db;
			$query = $db->prepare('DELETE FROM cours WHERE id=:id');
			$parameters = [
				'id' => $id
			];
			$query->execute($parameters);
			include './src/includes/_success.phtml';
		}
		
}


