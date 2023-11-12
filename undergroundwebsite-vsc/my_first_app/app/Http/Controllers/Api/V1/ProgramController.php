<?php

namespace App\Http\Controllers\Api\V1;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Traits\ResponseTrait;
use App\Http\Requests\V1\ProgramFormRequest;
use App\Repositories\ProgramRepository;

class ProgramController extends Controller
{
    use ResponseTrait;

    /**
     * Dependency Injection - START
     */
    public $programRepository;

    public function __construct(ProgramRepository $programRepository) {
        $this->programRepository = $programRepository;
    }
    /**
     * Dependency Injection - STOP
     */

    /**
     * @OA\Get(
     *     path="/api/v1/programs",
     *     tags={"Programs"},
     *     summary="Gets all programs",
     *     description="Gets all the program slots and their details from db.",
     *     operationId="indexProgram",
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
        // $this->authorize('viewAny',Program::class);
        try {
            return $this->responseSuccess($this->programRepository->getAll(),'Programs fetched successfully.');
        } catch (Exception $e) {
            return $this->responseError([],$e->getMessage());
        }
    }

    /**
     * @OA\Get(
     *     path="/api/v1/programs/{id}",
     *     tags={"Programs"},
     *     summary="Gets program by id",
     *     description="Gets the program slot and it's details from db.",
     *     operationId="showProgram",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Id of program",
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
        // $this->authorize('view',$program);
        try {
            return $this->responseSuccess($this->programRepository->getById($id),'Program fetched successfully.');
        } catch (Exception $e) {
            return $this->responseError([],$e->getMessage());
        }
    }

    /**
     * @OA\Post(
     *     path="/api/v1/programs",
     *     tags={"Programs"},
     *     summary="Creates a new program slot",
     *     description="Adds a new program slot and it's details in db.",
     *     operationId="storeProgram",
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
    public function store(ProgramFormRequest $request)
    {
        try {
            return $this->responseSuccess($this->programRepository->addNew($request),'Program created successfully.');
        } catch (Exception $e) {
            return $this->responseError([],$e->getMessage());
        }
    }

    /**
     * @OA\Put(
     *     path="/api/v1/programs/{id}",
     *     tags={"Programs"},
     *     summary="Updates the details of a program",
     *     description="Edit some or all the details of a program.",
     *     operationId="updateProgram",
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
    public function update(int $id, ProgramFormRequest $request)
    {
        try {
            return $this->responseSuccess($this->programRepository->edit($id,$request),'Program updated successfully.');
        } catch (Exception $e) {
            return $this->responseError([],$e->getMessage());
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/programs/{id}",
     *     tags={"Programs"},
     *     summary="Deletes the details of a program slot",
     *     description="Delete a program.",
     *     operationId="deleteProgram",
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
        // $this->authorize('delete',$program);
        try {
            return $this->responseSuccess($this->programRepository->delete($id),'Program deleted successfully.');
        } catch (Exception $e) {
            return $this->responseError([],$e->getMessage());
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/programs/clear",
     *     tags={"Programs"},
     *     summary="Deletes the entire program",
     *     description="Empties the program table.",
     *     operationId="clearProgram",
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
    public function clear()
    {
        // $this->authorize('empty',Program::class);
        try {
            return $this->responseSuccess($this->producerRepository->clear(),'Program cleared successfully.');
        } catch (Exception $e) {
            return $this->responseError([],$e->getMessage());
        }
    }

}
