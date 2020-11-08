<?php


namespace App\Controller\API\v1;


use App\Entity\Branch;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class CompanyAPIController
 *
 * @Route("/api/v1/employee")
 * @package App\Controller\API\v1
 */
class EmployeeAPIController extends AbstractController
{

    /**
     * @Route("/getAllFromBranch/{id}", methods={"GET"})
     * @param Branch $branch
     * @param SerializerInterface $serializer
     * @return Response
     */
    public function getAllFromBranch(Branch $branch, SerializerInterface $serializer): Response
    {
        $employees = $serializer->normalize(
            $branch->getEmployees()->toArray(),
            null,
            [
                AbstractNormalizer::ATTRIBUTES => ['name', 'position']
            ]
        );

        return $this->json(['status' => 'success', 'data' => $employees]);
    }

}