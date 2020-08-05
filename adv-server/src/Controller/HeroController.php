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
     * @param Request $request
     * @param HeroRepository $heroRepository
     * @return JsonResponse
     */
    public function list(Request $request, HeroRepository $heroRepository): JsonResponse
    {
        $searchterm = trim($request->request->get('searchterm'));

        // if (empty($searchterm)) $heros = $heroRepository->transformAll($heroRepository->findAll());
        if (empty($searchterm)) $heros = $heroRepository->transformAll($heroRepository->findByName(''));
        else $heros = $heroRepository->transformAll($heroRepository->findByName($searchterm));

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
        $data = json_decode($request->getContent(), true);
        $request->request->replace(is_array($data) ? $data : array());

        // validate the title
        if (! $request->get('name')) {
            return $this->respondValidationError('Please provide a name!');
        }

        // persist the new hero
        $hero = new Hero;
        $hero->setName($request->get('name'));
        $hero->setClass($request->get('class'));
        $hero->setType($request->get('type'));
        $hero->setDescription($request->get('description'));
        $hero->setPic($request->get('pic'));
        $hero->setLe($request->get('le'));
        $hero->setLeCurrent($request->get('le'));
        $hero->setAe($request->get('ae'));
        $hero->setAeCurrent($request->get('ae'));
        $hero->setInventory($request->get('inventory'));
        $hero->setWeapon($request->get('weapon'));
        $hero->setAt($request->get('at'));
        $hero->setPa($request->get('pa'));
        $hero->setAttributes($request->get('attributes'));
        $hero->setState($request->get('state'));

        $em->persist($hero);
        $em->flush();
        return $this->respondCreated($heroRepository->transform($hero));
    }

    /**
     * @param int $id
     * @param HeroRepository $heroRepository
     * @param EntityManagerInterface $em
     * @return JsonResponse
     */
    public function get(int $id, HeroRepository $heroRepository, EntityManagerInterface $em): JsonResponse
    {
        $hero = $heroRepository->find($id);
        return $this->respondCreated($heroRepository->transform($hero));
    }

    /**
     * @param int $id
     * @param Request $request
     * @param HeroRepository $heroRepository
     * @param EntityManagerInterface $em
     * @return JsonResponse
     */
    public function update(int $id, Request $request, HeroRepository $heroRepository, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $request->request->replace(is_array($data) ? $data : array());

        // validate the title
        if (! $request->get('name')) {
            return $this->respondValidationError('Please provide a name!');
        }

        // persist the new hero
        $hero = $heroRepository->find($id);
        $hero->setName($request->get('name'));
        $hero->setClass($request->get('class'));
        $hero->setType($request->get('type'));
        $hero->setDescription($request->get('description'));
        $hero->setPic($request->get('pic'));
        $hero->setLe($request->get('le'));
        $hero->setLeCurrent($request->get('le_current'));
        $hero->setAe($request->get('ae'));
        $hero->setAeCurrent($request->get('ae_current'));
        $hero->setInventory($request->get('inventory'));
        $hero->setWeapon($request->get('weapon'));
        $hero->setAt($request->get('at'));
        $hero->setPa($request->get('pa'));
        $hero->setAttributes($request->get('attributes'));
        $hero->setState($request->get('state'));

        $em->persist($hero);
        $em->flush();
        return $this->respondCreated($heroRepository->transform($hero));
    }

    /**
     * @param int $id
     * @param Request $request
     * @param HeroRepository $heroRepository
     * @param EntityManagerInterface $em
     * @return JsonResponse
     */
    public function delete(int $id, Request $request, HeroRepository $heroRepository, EntityManagerInterface $em): JsonResponse
    {
        $hero = $heroRepository->find($id);
        if (null === $hero) {
            return $this->respondCreated('Hero with id ' . $id . ' was not found. (Already removed?)');
        }
        $em->remove($hero);
        $em->flush();
        return $this->respondCreated(true);
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
