<?php


namespace App\Controller\API\v1;


use App\Entity\Branch;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
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
     * @return JsonResponse
     */
    public function getAllFromBranch(Branch $branch, SerializerInterface $serializer): JsonResponse
    {
        $employees = $serializer->normalize(
            $branch->getEmployees(),
            null,
            [AbstractNormalizer::ATTRIBUTES => ['name', 'position'],]
        );

        return $this->json(['status' => 'success', 'data' => $employees]);
    }

}