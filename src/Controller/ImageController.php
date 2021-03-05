<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Drawable;

class ImageController extends AbstractController
{
    /**
     * @Route("/image", name="image")
     */
    public function index(Request $request): Response
    {
        
        $level=$request->query->get('level')?intval($request->query->get('level')):4;
        $elem = new Drawable($level);
        $elem->draw();
    }
}
