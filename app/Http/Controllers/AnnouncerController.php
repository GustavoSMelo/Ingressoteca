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

            $this->announcerModel->first_name = ucfirst($request->input('firstName'));
            $this->announcerModel->last_name = ucfirst($request->input('lastName'));
            $this->announcerModel->email = $request->input('email');
            $this->announcerModel->password = $password_hash;

            $this->announcerModel->save();

            return response()->json([
                'message' => 'User created with success'
            ]);
        } catch (Exception $err) {
            return throw new Exception('Error to create a user');
        }
    }


    /**
     * @inheritDoc
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $user = $this->announcerModel::find($id);

        if (empty($user)) {
            return throw new Exception('Cannot update this user');
        }

        $password = $request->input('password');
        $checkPassword = $request->input('checkPassword');
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');
        $email = $request->input('email');

        if (empty($password)) {
            return throw new Exception('Cannot update this user');
        } else if (Hash::check($password, $user->password) && $password === $checkPassword) {
            try {

                $user->firstName = (empty($firstName)) ? $user->firstName : $firstName;
                $user->lastName = (empty($lastName)) ? $user->lastName : $lastName;
                $user->email = (empty($email)) ? $user->email : $email;

                $user->save();
                return response()->json([
                    'message' => 'User updated with success'
                ]);
            } catch (Exception $err) {
                return throw new Exception('Error to update this user, try again');
            }
        }
    }
}
