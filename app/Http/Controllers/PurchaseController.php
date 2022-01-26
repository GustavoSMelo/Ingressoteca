<?php

namespace App\Http\Controllers;

use App\Models\PurchaseModel;
use App\Models\ShowModel;
use App\Models\TicketModel;
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
     * @var TicketModel
     */
    private $ticketModel;

    /**
     * @var ShowModel
     */
    private $showModel;

    /**
     * @param PurchaseModel $purchaseModel
     * @param TicketModel $ticketModel
     * @param ShowModel $showModel
     */
    public function __construct(PurchaseModel $purchaseModel, TicketModel $ticketModel, ShowModel $showModel)
    {
        $this->purchaseModel = $purchaseModel;
        $this->ticketModel = $ticketModel;
        $this->showModel = $showModel;

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

    /**
     * @inheritDoc
     * @override
     */
    public function show (int $id): JsonResponse
    {
        try {
            $arrayTickets = [];
            $ticketShow = [];

            $purchases = $this->purchaseModel->where('user_id', $id)->get();
            foreach ($purchases as $purchase){
                $arrayTickets[] = $this->ticketModel->where('id', $purchase->ticket_id)->first();
            }

            foreach ($arrayTickets as $ticket) {
                $helper[] = $this->showModel->where('id', $ticket->show_id)->first()->show_name;
                $helper[] = $ticket;

                $ticketShow[] = $helper;
                $helper = [];
            }

            return response()->json(['tickets' => $ticketShow]);

        } catch (DomainException $err) {
            return response()->json([
                'error' => 'a error happens when try get purchases'
            ]);
        }
    }
}
