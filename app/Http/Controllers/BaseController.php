<?php
namespace App\Http\Controllers;

use Exception;
use App\Http\Controllers\Controller;
use Dflydev\DotAccessData\Exception\DataException;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class BaseController extends Controller {
    /**
     * @var object
     */
    protected $modelClass;

    /**
     * @param object $modelClass
     */
    public function __construct(object $modelClass)
    {
        $this->modelClass = $modelClass;
    }

    /**
     * Save a information in database using a class from constructor
     *
     * @throws Exception
     * @param Request $request
     * @return JsonResponse
     */
    public function store (Request $request): JsonResponse
    {
        try {
            $this->modelClass::create($request->all());

            return response()->json([
                'message' => 'saved with success'
            ], 200);

        } catch (Exception $err) {
            Log::error($err);
            return response()->json('A error happens when try save this data', 400);
        }
    }

    /**
     * Method to get all datas from a database using a class passed in constructor
     *
     * @return JsonResponse
     */
    public function index (): JsonResponse
    {
        try {
            return response()
                ->json($this->modelClass::all());
        } catch (Exception $err) {
            return response()->json('Error to get all datas', 400);
        }
    }

    /**
     * Method to get a single data from a database using a class passed in constructor
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function show (int $id): JsonResponse
    {
        try {
            return response()
                ->json(
                $this->modelClass::find($id)
            );
        } catch (Exception $err) {
            return response()->json('This information does not exists', 400);
        }
    }

    /**
     * Method to update data from a database using a class passed in constructor
     *
     * @param Request $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update (Request $request, int $id): JsonResponse
    {
        try {
            $information = $this->modelClass::find($id);

            $information
                ->fill($request->all())
                ->save();

            return response()->json([
                'message' => 'Updated with success '
            ]);
        } catch (Exception $err) {
            return response()->json('Error to update this information', 400);
        }
    }

    /**
     * Method to delete data from a database using a class passed in constructor
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function delete (int $id): JsonResponse
    {
        try {
            $information = $this->modelClass::find($id);

            $information->delete()->save();

            return response()->json([
                'message' => 'Deleted with success '
            ]);
        } catch (Exception $err) {
            return response()->json('Error to delete this information', 400);
        }
    }
}
