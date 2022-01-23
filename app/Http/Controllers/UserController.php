<?php
namespace App\Http\Controllers;

use Exception;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends BaseController {
    /**
     * @var UserModel
     */
    private $userModel;

    /**
     * @param UserModel $userModel
     */
    public function __construct(UserModel $userModel) {
        $this->userModel = $userModel;

        parent::__construct($this->userModel);
    }

    /**
     * @inheritDoc
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $password_hash = Hash::make($request->input('password'));

            $this->userModel->first_name = ucfirst($request->input('first_name'));
            $this->userModel->last_name = ucfirst($request->input('last_name'));
            $this->userModel->email = $request->input('email');
            $this->userModel->password = $password_hash;

            $this->userModel->save();

            return response()->json([
                'message' => 'User created with success'
            ]);
        } catch (Exception $err) {
            Log::error($err);
            return response()->json('Error to create a user'.$err, 400);
        }
    }

    /**
     * @inheritDoc
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $user = $this->userModel::find($id);

        if (empty($user)) {
            return response()->json('Cannot update this user', 400);
        }

        $password = $request->input('password');
        $checkPassword = $request->input('checkPassword');
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $email = $request->input('email');

        if (empty($password)) {
            return response('Cannot update this user', 400);
        } else if (Hash::check($password, $user->password) && $password === $checkPassword) {
            try {

                $user->first_name = (empty($first_name)) ? $user->first_name : $first_name;
                $user->last_name = (empty($last_name)) ? $user->last_name : $last_name;
                $user->email = (empty($email)) ? $user->email : $email;

                $user->save();
                return response()->json([
                    'message' => 'User updated with success'
                ]);
            } catch (Exception $err) {
                return response()->json('Error to update this user, try again', 401);
            }
        }
    }
}
