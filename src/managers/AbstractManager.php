<?php

abstract class AbstractManager
{
    protected PDO $db;

    // fonction qui initialise la connexion à la DB
    function __construct()
    {
        $this->db = new PDO(
        	'mysql:host=db.3wa.io;port=3306;dbname=beucheralexis_belle_epoque;charset=utf8',
			'beucheralexis',
			'6e8483129fd777c045a2009608fa54d9'
		);
    }

    // getter de la DB
    protected function getDb()
    {
        return $this->db;
    }
}

?>