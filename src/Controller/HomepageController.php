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
        $bouquets = (new Finder())->files()->in("../public/imgs/bouquets");
        $wedding = (new Finder())->files()->in("../public/imgs/wedding");
        $baskets = (new Finder())->files()->in("../public/imgs/baskets");
        $rings = (new Finder())->files()->in("../public/imgs/rings");
        $halls = (new Finder())->files()->in("../public/imgs/halls");
        $other = (new Finder())->files()->in("../public/imgs/other");
        return $this->render('gallery/gallery.html.twig',
            array(
                'bouquets' => $bouquets,
                'wedding' => $wedding,
                'baskets' => $baskets,
                'rings' => $rings,
                'halls' => $halls,
                'other' => $other
            )
        );
    }
}
