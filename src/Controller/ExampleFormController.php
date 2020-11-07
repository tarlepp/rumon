<?php
namespace App\Controller;

use App\Entity\Example;
use App\Form\ExampleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExampleFormController extends AbstractController
{
    /**
     * @Route(
     *     path="/",
     *     methods={"GET"}
     *  )
     */
    public function __invoke(Request $request): Response
    {
        $example = new Example();

        $form = $this->createForm(ExampleType::class, $example);
        $form->handleRequest($request);

        return $this->render(
            'example/form.html.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }
}
