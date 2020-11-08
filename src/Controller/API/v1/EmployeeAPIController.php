<?php


namespace App\Controller\API\v1;


use App\Entity\Branch;
use App\Entity\Employee;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonDecode;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
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
     * @Route("/getByBranch/{id}", methods={"GET"})
     * @param Branch $branch
     * @param SerializerInterface $serializer
     * @return Response
     */
    public function getByBranch(Branch $branch, SerializerInterface $serializer): Response
    {
        $employees = $branch->getEmployees()->toArray();
        foreach ($employees as $index => $employee) {
            $employees[$index] =  $serializer->normalize($employee, null, [AbstractNormalizer::ATTRIBUTES => ['name', 'position']]);
        }

        return $this->json(['status' => 'success', 'data' => $employees]);
    }

}