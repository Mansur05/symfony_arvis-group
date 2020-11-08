<?php


namespace App\Controller\API\v1;


use App\Entity\Company;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class CompanyAPIController
 *
 * @Route("/api/v1/company")
 * @package App\Controller\API\v1
 */
class CompanyAPIController extends AbstractController
{

    /**
     * Returns company info
     *
     * @Route("/read/{id}", methods={"GET"})
     * @param Company $company
     * @param SerializerInterface $serializer
     * @return JsonResponse
     */
    public function read(Company $company, SerializerInterface $serializer): JsonResponse
    {
        $company = $serializer->normalize($company, null, [AbstractNormalizer::ATTRIBUTES => ['id', 'name']]);

        return $this->json(['status' => 'success', 'data' => $company]);
    }

}