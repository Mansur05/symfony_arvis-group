<?php


namespace App\Controller\API\v1;


use App\Entity\Company;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;


/**
 * Class BranchAPIController
 *
 * @Route("/api/v1/branch")
 * @package App\Controller\API\v1
 */
class BranchAPIController extends AbstractController
{

    /**
     * Returns all branches from company by id (company id)
     *
     * @Route("/readAllFromCompany/{id}", methods={"GET"})
     * @param Company $company
     * @param SerializerInterface $serializer
     * @return JsonResponse
     */
    public function readAllFromCompany(Company $company, SerializerInterface $serializer): JsonResponse
    {
        $branches = $serializer->normalize(
            $company->getBranches(), null,
            [AbstractNormalizer::ATTRIBUTES => ['id', 'name', 'description'],]
        );

        return $this->json(['status' => 'success', 'data' => $branches]);
    }

}