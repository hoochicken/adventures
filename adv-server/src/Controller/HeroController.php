<?php
namespace App\Controller;

use App\Repository\HeroClassRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Hero;
use App\Repository\HeroRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HeroController extends ApiController
{

    /**
     * @param HeroRepository $heroRepository
     * @return JsonResponse
     */
    public function index(HeroRepository $heroRepository): JsonResponse
    {
        $heros = $heroRepository->transformAll();
        return $this->respond($heros);
    }
    /**
     * @param Request $request
     * @param HeroRepository $heroRepository
     * @param EntityManagerInterface $em
     * @return JsonResponse
     */
    public function create(Request $request, HeroRepository $heroRepository, EntityManagerInterface $em): JsonResponse
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
     * @param Request $request
     * @param EntityManagerInterface $em
     * @param HeroRepository $heroRepository
     * @return JsonResponse
     */
    public function decrease(Request $request, EntityManagerInterface $em, HeroRepository $heroRepository)
    {
        $request = Request::createFromGlobals();
        $id = (int) $request->request->get('id');
        $hero = $heroRepository->find($id);

        if (!$hero) {
            return $this->respondNotFound(sprintf('The hero entity witrh the id %s could not be found', $id));
        }

        $hero->setLeCurrent($hero->getLeCurrent() - 1);
        $em->persist($hero);
        $em->flush();

        return $this->respond([
            'le_current' => $hero->getLeCurrent()
        ]);
    }

    /**
     * @param Request $request
     * @param EntityManagerInterface $em
     * @param HeroClassRepository $heroClassRepository
     * @return JsonResponse
     */
    public function getClass(Request $request, EntityManagerInterface $em, HeroClassRepository $heroClassRepository)
    {
        $classes = $heroClassRepository->transformAll();
        return $this->respond($classes);
    }
}
