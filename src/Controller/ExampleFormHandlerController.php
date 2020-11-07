<?php
namespace App\Controller;

use App\Entity\Example;
use App\Form\ExampleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExampleFormHandlerController extends AbstractController
{
    /**
     * @Route(
     *     path="/",
     *     methods={"POST"}
     *  )
     */
    public function __invoke(Request $request): Response
    {
        $example = new Example();

        $form = $this->createForm(ExampleType::class, $example);
        $form->handleRequest($request);

        if (!($form->isSubmitted() && $form->isValid())) {
            return $this->forward(ExampleFormController::class);
        }

        dd('All is ok now');

        // @TODO: Save to database
        //$this->addFlash('success', 'Blog created!');
        //return $this->redirectToRoute('app_home_index');
    }
}
