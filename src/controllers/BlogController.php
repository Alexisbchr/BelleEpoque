<?php

class BlogController
{
    public function index()
    {
        require "./src/templates/blog_index.phtml";
    }

    public function show(int $id)
    {
        require "./src/templates/blog_show.phtml";
    }
}