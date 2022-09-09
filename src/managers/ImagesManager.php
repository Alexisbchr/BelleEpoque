<?php
/**
 * This file contains all functions for CRUD lesson
 */

require './src/entities/Images.php';

class ImagesManager
{
		private PDO $db;

		/**
		 * @param PDO $db
		 */
		public function __construct()
		{
				$this->db = new PDO('mysql:host=db.3wa.io;
				port=3306;dbname=beucheralexis_belle_epoque',
				'beucheralexis', '6e8483129fd777c045a2009608fa54d9');
		}

		/**
		 * @return PDO
		 */
		public function getDb():
				string
				{
						return $this->db;
				}

				/**
				 * @param string $db
				 */
				public function setDb(PDO $db):
						void
						{
								$this->db = $db;
						}

						public function addimage()
						{
								if (isset($_POST['addimage']))
								{
										$dataImage = ['img_lien' => 'images/' . $_FILES['image']['name'],
										'img_file' => $_FILES['image']['tmp_name']];

										$data = ['title' => htmlspecialchars($_POST['title']) ,
										'img_lien' => $dataImage['img_lien']];

										move_uploaded_file($dataImage['img_file'], $dataImage['img_lien']);

										$db = $this->db;
										$query = $db->prepare('INSERT INTO images (title, lien)
					VALUES (:title, :img_lien)');
										$query->execute($data);
								}
						}
						public function getDataImages()
						{
								$db = $this->db;
								$query = $db->prepare('SELECT * FROM images');
								$query->execute();
								$images = $query->fetchAll(PDO::FETCH_ASSOC);
								return $images;
								var_dump($images);
						}
						public function getImageById(int $id):
								Images
								{
										$db = $this->db;
										$query = $db->prepare('SELECT * FROM images WHERE id=:id');
										$parameters = ['id' => $id];
										$query->execute($parameters);
										$image = $query->fetchAll(PDO::FETCH_ASSOC);
										$images = new Images($image[0]['id'], $image[0]['title'], $image[0]['lien']);
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
										header('Location: /BelleEpoque/admin');
								}
								public function deleteimage(int $id)
            		{
            			$db=$this->db;
            			$query = $db->prepare('DELETE FROM images WHERE id=:id');
            			$parameters = [
            				'id' => $id
            			];
            			$query->execute($parameters);
            			include './src/includes/_success.phtml';
            		}
						}

