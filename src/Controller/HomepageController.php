<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepage()
    {
        return $this->render('homepage/homepage.html.twig');
    }

    /**
     * @Route("/gallery", name="gallery")
     */
    public function gallery()
    {
        return $this->render('gallery/gallery.html.twig');
    }
}
