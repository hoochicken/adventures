<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Place;
use App\Repository\PlaceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PlaceController extends ApiController
{

    /**
     * @param Request $request
     * @param PlaceRepository $placeRepository
     * @return JsonResponse
     */
    public function list(Request $request, PlaceRepository $placeRepository): JsonResponse
    {
        // retrieve data from request query
        $searchterm = trim($request->request->get('searchterm'));
        $listState = json_decode($request->request->get('listState'));
        $currentPage = $listState->currentPage ?? 0;
        $maxResult = $listState->maxResults ?? 0;

        // get items and pagination info
        $result = $placeRepository->findByName($searchterm, $currentPage, $maxResult);
        $items = $placeRepository->transformAll($result['items']);

        // build return array
        return $this->respond(['items' => $items, 'listState' => $result['listState']]);
    }

    /**
     * @param Request $request
     * @param PlaceRepository $placeRepository
     * @param EntityManagerInterface $em
     * @return JsonResponse
     */
    public function create(Request $request, PlaceRepository $placeRepository, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $request->request->replace(is_array($data) ? $data : array());

        // validate the title
        if (! $request->get('name')) {
            return $this->respondValidationError('Please provide a name!');
        }

        // persist the new place
        $place = new Place;
        $place->setName($request->get('name'));
        $place->setDescription($request->get('description'));
        $place->setAttributes($request->get('attributes'));
        $place->setState($request->get('state'));

        $em->persist($place);
        $em->flush();
        return $this->respondCreated($placeRepository->transform($place));
    }

    /**
     * @param int $id
     * @param PlaceRepository $placeRepository
     * @param EntityManagerInterface $em
     * @return JsonResponse
     */
    public function get(int $id, PlaceRepository $placeRepository, EntityManagerInterface $em): JsonResponse
    {
        $place = $placeRepository->find($id);
        return $this->respondCreated($placeRepository->transform($place));
    }

    /**
     * @param int $id
     * @param Request $request
     * @param PlaceRepository $placeRepository
     * @param EntityManagerInterface $em
     * @return JsonResponse
     */
    public function update(int $id, Request $request, PlaceRepository $placeRepository, EntityManagerInterface $em): JsonResponse
    {
        // return $this->respondCreated([1,2,3,4]);
        $data = json_decode($request->getContent(), true);
        $request->request->replace(is_array($data) ? $data : array());

        // validate the title
        if (! $request->get('name')) {
            return $this->respondValidationError('Please provide a name!');
        }

        // persist the new place
        $place = $placeRepository->find($id);
        $place->setName($request->get('name'));
        $place->setDescription($request->get('description'));

        $em->persist($place);
        $em->flush();
        return $this->respondCreated($placeRepository->transform($place));
    }

    /**
     * @param int $id
     * @param Request $request
     * @param PlaceRepository $placeRepository
     * @param EntityManagerInterface $em
     * @return JsonResponse
     */
    public function delete(int $id, Request $request, PlaceRepository $placeRepository, EntityManagerInterface $em): JsonResponse
    {
        $place = $placeRepository->find($id);
        if (null === $place) {
            return $this->respondCreated('Place with id ' . $id . ' was not found. (Already removed?)');
        }
        $em->remove($place);
        $em->flush();
        return $this->respondCreated(true);
    }
}
