<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Finder\Finder;

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
        $finder = new Finder();
        $finder->files()->in("../public/imgs/");
        return $this->render('gallery/gallery.html.twig', array('imgs' => $finder));
    }
}
