<?php

namespace App\Controller;

use App\Entity\Company;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompanyController extends AbstractController
{
    /**
     * Render company by id (company id)
     *
     * @Route("/company/{id}", name="index")
     * @param Company $company
     * @return Response
     */
    public function index(Company $company): Response
    {
        return $this->render('company/index.html.twig', [
            'company' => $company,
        ]);
    }
}
