<?php
/**
 * This file contains all functions for CRUD galery
 */

require './src/entities/Images.php';

class ImagesManager extends AbstractManager
{

	public function addimage()
	{
		if (isset($_POST['addimage']))
		{
			$dataImage = ['img_lien' => 'images/' . $_FILES['image']['name'],
			'img_file' => $_FILES['image']['tmp_name']];

			$data = ['title' => htmlspecialchars($_POST['title']),
			'img_lien' => $dataImage['img_lien'],
			'timestamp' => htmlspecialchars($_POST['timestamp'])];

			move_uploaded_file($dataImage['img_file'], $dataImage['img_lien']);

			$db = $this->db;
			$query = $db->prepare('INSERT INTO images (title, lien, timestamp) VALUES (:title, :img_lien, :timestamp)');
			$query->execute($data);

  			header ('Location: /BelleEpoque/admin/galerie');
  			exit();

		}
	}
	public function getDataImages()
	{
			$db = $this->db;
			$query = $db->prepare('SELECT * FROM images');
			$query->execute();
			$images = $query->fetchAll(PDO::FETCH_ASSOC);
			return $images;
	}
	public function getImageById(int $id) : Images
	{
			$db = $this->db;
			$query = $db->prepare('SELECT * FROM images WHERE id=:id');
			$parameters = ['id' => $id];
			$query->execute($parameters);
			$image = $query->fetchAll(PDO::FETCH_ASSOC);
			$images = new Images($image[0]['id'], $image[0]['title'], $image[0]['lien'], $image[0]['timestamp']);
			return $images;


	}
   private function generateFileName() : string
      {
          $randomString = bin2hex(random_bytes(10)); // random string, 20 characters a-z 0-9

          return $randomString;
      }

	public function editimage(int $id, string $title, string $lien)
	{
			$db = $this->db;
			$query = $db->prepare('UPDATE images SET id=:id, title=:title, lien=:img_lien WHERE id=:id');
			$parameters = ['id' => $id, 'title' => $title, 'img_lien' => $lien];
			$query->execute($parameters);
			header ('Location: /BelleEpoque/admin/galerie');
			exit();
	}
	public function deleteimage(int $id)
	{
		$db=$this->db;
		$query = $db->prepare('DELETE FROM images WHERE id=:id');
		$parameters = [
			'id' => $id
		];
		$query->execute($parameters);
  	header ('Location: /BelleEpoque/admin/galerie');
		exit();
	}
}

