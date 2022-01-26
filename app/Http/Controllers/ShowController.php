<?php
namespace App\Http\Controllers;

use App\Models\ShowModel;
use DomainException;
use Exception;
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
     * method used to get all shows from announcer
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function getByAnnouncerId(int $id): JsonResponse
    {
        try {
            $shows = $this->showModel->where('announcer_id', $id)->get();

            return response()->json(['shows' => $shows]);
        } catch (Exception $err) {
            return response()->json('Error to get all shows from announcer', 401);
        }
    }

    /**
     * Method to get all show per one category
     *
     * @param string $category
     */
    public function getPerCategory(string $category)
    {
        try {
            $showsWithCategory = $this->showModel->where('category', $category)->get();

            if (count($showsWithCategory) <= 0) {
                return response('Does not exist any show with this category', 400);
            }

            return response()->json($showsWithCategory);
        } catch (DomainException $err) {
            return response()->json('error to get shows with this category', 400);
        }
    }
}
