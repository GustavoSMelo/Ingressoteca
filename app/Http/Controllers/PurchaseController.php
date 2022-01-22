<?php

namespace App\Http\Controllers;

use App\Models\PurchaseModel;
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
}
