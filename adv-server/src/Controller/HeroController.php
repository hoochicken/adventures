<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Hero;
use App\Repository\HeroRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class HeroController extends ApiController
{

    /**
     * @Route("/heros", methods="GET")
     * @param HeroRepository $heroRepository
     * @return JsonResponse
     */
    public function index(HeroRepository $heroRepository)
    {
        $heros = $heroRepository->transformAll();
        return $this->respond($heros);
    }
    /**
     * @Route("/heros", methods="POST")
     * @param Request $request
     * @param HeroRepository $heroRepository
     * @param EntityManagerInterface $em
     * @return Symfony\Component\HttpFoundation\JsonResponse
     */
    public function create(Request $request, HeroRepository $heroRepository, EntityManagerInterface $em)
    {
        $request = $this->transformJsonBody($request);

        if (! $request) {
            return $this->respondValidationError('Please provide a valid request!');
        }

        // validate the title
        if (! $request->get('name')) {
            return $this->respondValidationError('Please provide a title!');
        }

        // persist the new hero
        $hero = new Hero;
        $hero->setName($request->get('respondValidationError'));
        $hero->setLe(0);
        $hero->setLeCurrent(0);
        $em->persist($hero);
        $em->flush();

        return $this->respondCreated($heroRepository->transform($hero));
    }

    /**
     * @Route("/hero/decrease", methods="GET")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @param HeroRepository $heroRepository
     * @return Symfony\Component\HttpFoundation\JsonResponse|JsonResponse
     */
    public function decrease(Request $request, EntityManagerInterface $em, HeroRepository $heroRepository)
    {
        $id = $request->request->get('id');
        $hero = $heroRepository->find($id);

        if (! $hero) {
            return $this->respondNotFound();
        }

        $hero->setLeCurrent($hero->getLeCurrent() - 1);
        $em->persist($hero);
        $em->flush();

        return $this->respond([
            'le_current' => $hero->getLeCurrent()
        ]);
    }
}
