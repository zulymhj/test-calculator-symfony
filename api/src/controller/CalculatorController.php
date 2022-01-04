<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\NotFoundHttpException;

class CalculatorController extends AbstractController
{
    /**
     * @Route("/api/{operation}/{operator1}/{operator2}",methods={"GET"},name="api_calculate")
     */
    public function calculate(string $operation,int $operator1,int $operator2):JsonResponse
    {
        $result=0;
        switch ($operation){
            case "add":
                $result=$this->add((int)$operator1,(int)$operator2);
                break;
            case "subtract":
                $result=$this->subtract((int)$operator1,(int)$operator2);
                break;
            default:
                throw $this->createNotFoundException('operator no found');
        }
        return new JsonResponse(['result' => $result],Response::HTTP_OK);
    }

    private function add(int $operator1, int $operator2):int{
        $result=$operator1+$operator2;
        return $result;
    }
    private function subtract(int $operator1, int $operator2):int{
        $result=$operator1-$operator2;
        return $result;
    }
}