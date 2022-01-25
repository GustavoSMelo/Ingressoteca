<?php

namespace App\Http\Controllers;

use App\Models\PurchaseModel;
use DomainException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PurchaseController extends BaseController
{
    /**
     * @var PurchaseModel
     */
    private $purchaseModel;

    /**
     * @param PurchaseModel $purchaseModel
     */
    public function __construct(PurchaseModel $purchaseModel)
    {
        $this->purchaseModel = $purchaseModel;

        parent::__construct($this->purchaseModel);
    }

    /**
     * @override
     * @inheritDoc
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $this->purchaseModel->user_id = $request->input('user_id');
            $this->purchaseModel->ticket_id = $request->input('ticket_id');
            $this->purchaseModel->save();

            return response()->json([
                'message' => 'Purchase accomplished with success '
            ]);
        } catch (DomainException $err) {
            return response()->json([
                'error' => 'a error happens when try purchase this ticket show'
            ], 400);
        }
    }
}
