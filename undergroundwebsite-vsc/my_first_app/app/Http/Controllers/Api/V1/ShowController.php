<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Show;
use App\Models\Producer;
use App\Http\Requests\V1\ShowFormRequest;
use App\Traits\ResponseTrait;
use App\Repositories\ShowRepository;

class ShowController extends Controller
{
    use ResponseTrait;

    /**
     * Dependency Injection - START
     */
    public $showRepository;

    public function __construct(ShowRepository $showRepository) {
        $this->showRepository = $showRepository;
    }

    /**
     * @OA\Get(
     *     path="/api/v1/shows",
     *     tags={"Shows"},
     *     summary="Gets all shows",
     *     description="Gets all shows and their details from db.",
     *     operationId="indexShow",
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
    public function index()
    {
        // $this->authorize('viewAny',Program::class);
        try {
            return $this->responseSuccess($this->showRepository->getAll(),'Shows fetched successfully.');
        } catch (Exception $e) {
            return $this->responseError([],$e->getMessage());
        }
    }

    /**
     * Returns a JSON with the show , it's details and it's producers
     * Usage :
     * api/v1/shows/2?includeProducers=true
     * OR
     * api/v1/shows/2
     */
    public function show(Show $show)
    {
        $this->authorize('view',$show);
        try{
            $includeProducers = request()->query('includeProducers');
            if($includeProducers)
            {
                return new ShowResource($show->loadMissing('producers'));
            }
            return new ShowResource($show);
        } catch (exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'data' => null,
                'errors' => []
            ]);
        }
    }

    /**
     * Create a new Show
     */
    public function store(ShowFormRequest $request)
    {
        try{
            return new ShowResource(Show::create($request->all()));
        } catch (exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'data' => null,
                'errors' => []
            ]);
        }
    }

    /**
     * Update a show
     */
    public function update(Show $show, ShowFormRequest $request)
    {
        try{
            $show->update($request->all());
        } catch (exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'data' => null,
                'errors' => []
            ]);
        }
    }

    /**
     * Delete a show
     */
    public function destroy(Show $show)
    {
        $this->authorize('delete',$show);
        try{
            $show->delete();
        } catch (exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'data' => null,
                'errors' => []
            ]);
        }
    }
}
