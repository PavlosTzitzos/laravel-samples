<?php

namespace App\Http\Controllers\Api\V1;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\ProducerFormRequest;
use App\Traits\ResponseTrait;
use App\Repositories\ProducerRepository;

class ProducerController extends Controller
{
    use ResponseTrait;

    /**
     * Dependency Injection - START
     */
    public $producerRepository;

    public function __construct(ProducerRepository $producerRepository) {
        $this->producerRepository = $producerRepository;
    }

    /**
     * @OA\Get(
     *     path="/api/v1/producers",
     *     tags={"Producers"},
     *     summary="Gets all producers",
     *     description="Gets all the producers and their details from db.",
     *     operationId="indexProducer",
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid status value"
     *     )
     * )
     */
    public function index() : JsonResponse
    {
        // $this->authorize('viewAny',Producer::class);
        try {
            return $this->responseSuccess($this->producerRepository->getAll(),'Producers fetched successfully.');
        } catch (Exception $e) {
            return $this->responseError([],$e->getMessage());
        }
    }

    /**
     * @OA\Get(
     *     path="/api/v1/producers/{id}",
     *     tags={"Producers"},
     *     summary="Gets producer by id",
     *     description="Gets the producer and his details from db.",
     *     operationId="showProducer",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Id of producer",
     *         required=true,
     *         explode=true,
     *         @OA\Schema(
     *             type="integer",
     *             example=1
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid status value"
     *     )
     * )
     */
    public function show(int $id) : JsonResponse
    {
        // $this->authorize('view',$producer);
        try {
            return $this->responseSuccess($this->producerRepository->getById($id),'Producer fetched successfully.');
        } catch (Exception $e) {
            return $this->responseError([],$e->getMessage());
        }
    }

    /**
     * @OA\Post(
     *     path="/api/v1/producers",
     *     tags={"Producers"},
     *     summary="Creates a new producer",
     *     description="Adds a new producer and his details in db.",
     *     operationId="storeProducer",
     *     @OA\Parameter(
     *         name="status",
     *         in="query",
     *         description="Status values that needed to be considered for filter",
     *         required=true,
     *         explode=true,
     *         @OA\Schema(
     *             default="available",
     *             type="string",
     *             enum={"available", "pending", "sold"},
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid status value"
     *     )
     * )
     */
    public function store(ProducerFormRequest $request) : JsonResponse
    {
        try {
            return $this->responseSuccess($this->producerRepository->addNew($request),'Producer created successfully.');
        } catch (Exception $e) {
            return $this->responseError([],$e->getMessage());
        }
    }

    /**
     * @OA\Put(
     *     path="/api/v1/producers/{id}",
     *     tags={"Producers"},
     *     summary="Updates the details of a producer",
     *     description="Edit some or all the details of a producer.",
     *     operationId="updateProducer",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Status values that needed to be considered for filter",
     *         required=true,
     *         explode=true,
     *         @OA\Schema(
     *             type="integer",
     *             example=1
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid status value"
     *     )
     * )
     */
    public function update(int $id, ProducerFormRequest $request) : JsonResponse
    {
        try {
            return $this->responseSuccess($this->producerRepository->edit($id,$request),'Producer updated successfully.');
        } catch (Exception $e) {
            return $this->responseError([],$e->getMessage());
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/producers/{id}",
     *     tags={"Producers"},
     *     summary="Deletes the details of a producer",
     *     description="Delete a producer.",
     *     operationId="deleteProducer",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Status values that needed to be considered for filter",
     *         required=true,
     *         explode=true,
     *         @OA\Schema(
     *             type="string",
     *             example=1
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid status value"
     *     )
     * )
     */
    public function destroy(int $id)
    {
        // $this->authorize('delete',$producer);
        try {
            return $this->responseSuccess($this->producerRepository->delete($id),'Producer deleted successfully.');
        } catch (Exception $e) {
            return $this->responseError([],$e->getMessage());
        }
    }

}
