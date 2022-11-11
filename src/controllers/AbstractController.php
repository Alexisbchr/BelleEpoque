<?php

abstract class AbstractController
{
	protected CoursManager $cm;

	public function init(CoursManager $cm)
	{
		$this->cm = $cm;
	}

	protected function clean_input($data)
	{
        $data = trim($data); //enleve les espaces avant et après une string
        $data = stripslashes($data); // enlève les '' d'une string
        $data = htmlspecialchars($data); //remplace certains caractères par une entité html (ex: > par &gt;)

        return $data;
    }
}