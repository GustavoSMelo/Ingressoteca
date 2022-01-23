<?php
namespace App\Http\Controllers;

use Exception;
use App\Models\AnnouncerModel;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class AnnouncerController extends BaseController {
    /**
     * @var AnnouncerModel
     */
    private $announcerModel;

    /**
     * @param AnnouncerModel $announcerModel
     */
    public function __construct(AnnouncerModel $announcerModel) {
        $this->announcerModel = $announcerModel;

        parent::__construct($this->announcerModel);
    }

    /**
     * @inheritDoc
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $password_hash = Hash::make($request->input('password'));

            $this->announcerModel->name = ucfirst($request->input('name'));
            $this->announcerModel->email = $request->input('email');
            $this->announcerModel->password = $password_hash;

            $this->announcerModel->save();

            return response()->json([
                'message' => 'Announcer created with success'
            ]);
        } catch (Exception $err) {
            return response()->json('Error to create a announcer', 400);
        }
    }

    /**
     * @inheritDoc
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $announcer = $this->announcerModel::find($id);

        if (empty($announcer)) {
            return response()->json('Cannot update this announcer', 400);
        }

        $password = $request->input('password');
        $name = ucfirst($request->input('name'));
        $email = $request->input('email');

        if (empty($password)) {
            return response()->json('Cannot update this announcer', 400);
        }
            try {
            $announcer->name = (empty($name)) ? $announcer->name : $name;
            $announcer->email = (empty($email)) ? $announcer->email : $email;

            $announcer->save();
            return response()->json([
                'message' => 'Announcer updated with success'
            ]);
        } catch (Exception $err) {
            return response()->json('Error to update this announcer, try again', 400);
        }
    }
}
