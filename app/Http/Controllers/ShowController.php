<?php
namespace App\Http\Controllers;

use App\Models\ShowModel;
use DomainException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ShowController extends BaseController
{
    /**
     * @var ShowModel
     */
    private $showModel;

    /**
     * @param ShowModel $showModel
     */
    public function __construct(ShowModel $showModel)
    {
        $this->showModel = $showModel;

        parent::__construct($this->showModel);
    }

    /**
     * Method to get all show per one category
     *
     * @param string $category
     * @return JsonResponse
     */
    public function getPerCategory(Request $request, string $category): JsonResponse
    {
        try {
            $showsWithCategory = $this->showModel->where('category', $category)->get();

            if (count($showsWithCategory) <= 0) {
                return response('Does not exist any show with this category', 400);
            }

            $offset = ($request->page - 1) * 5;

            $paginate = $showsWithCategory->query()
                ->offset($offset)
                ->limit(5)
                ->get();

            return response()->json($paginate);
        } catch (DomainException $err) {
            return response()->json('error to get shows with this category', 400);
        }
    }
}
