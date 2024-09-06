<?php

namespace App\Controllers;

use View;

class BlogController
{
    public function translations($blogId,$translationId)
    {
      
        $blogInfo = ['blogId' => $blogId,'translationId' => $translationId];

        return View::render('blog', ['blogInfo' => $blogInfo]);
    }

}
