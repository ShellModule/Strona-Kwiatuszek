<?php

namespace App\Controller;

use phpDocumentor\Reflection\Types\Boolean;
use Swift_Mailer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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
        $wreaths = (new Finder())->files()->in("../public/imgs/wreaths");
        $halls = (new Finder())->files()->in("../public/imgs/halls");
        $other = (new Finder())->files()->in("../public/imgs/other");
        return $this->render('gallery/gallery.html.twig',
            array(
                'bouquets' => $bouquets,
                'wedding' => $wedding,
                'baskets' => $baskets,
                'wreaths' => $wreaths,
                'halls' => $halls,
                'other' => $other
            )
        );
    }

    /**
     * @Route("/contact", name="contact")
     * @param Request $request
     * @param Swift_Mailer $mailer
     * @return Response
     */
    public function contact(Request $request, Swift_Mailer $mailer)
    {
        $data = $request->request->all();

        if ($data) {
            $message = (new \Swift_Message("Wiadomość ze strony od " . $data['email']))
                ->setFrom('kwiatuszek.noreply@gmail.com')
                ->setTo('mraucinxd@gmail.com')
                ->setBody(
                    "Imię: " . $data['name'] . "\n"
                    . "Telefon: " . $data['tel'] . "\n"
                    . "Email: " . $data['email'] . "\n\n"
                    . "Wiadomość: \n" . $data['msg']
                );

            $mailer->send($message);
            $this->addFlash('success', 'Pomyślnie przesłano formularz');
            return $this->redirectToRoute("contact");
        }

        return $this->render('contact/contact.html.twig');
    }
}
