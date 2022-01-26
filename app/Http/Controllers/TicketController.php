<?php

namespace App\Http\Controllers;

use App\Models\PurchaseModel;
use App\Models\ShowModel;
use App\Models\TicketModel;
use DomainException;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class TicketController extends BaseController
{
    /**
     * @var TicketModel
     */
    private $ticketModel;

    /**
     * @var PurchaseModel
     */
    private $purchaseModel;

    /**
     * @param TicketModel $ticketModel
     * @param PurchaseModel $purchaseModel
     */
    public function __construct(TicketModel $ticketModel, PurchaseModel $purchaseModel)
    {
        $this->ticketModel = $ticketModel;
        $this->purchaseModel = $purchaseModel;

        parent::__construct($this->ticketModel);
    }

    /**
     * @inheritDoc
     * @override
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $userId = $request->header('user_id');
            $showId = $request->input('show_id');
            $show = ShowModel::find($showId);

            $countTickets = $this->ticketModel->where('show_id', $showId)->count();

            $listTicket = $this->ticketModel->where('show_id', $showId)->get();
            $alreadyBought = false;
            foreach ($listTicket as $ticket) {
                $bought = $this->purchaseModel->where('ticket_id', $ticket->id)->where('user_id', $userId)->first();

                if (!empty($bought)) {
                    $alreadyBought = true;
                }
            }


            if ($alreadyBought) {
                Log::error('already bought this show');
                return response()->json([
                    'message' => 'already bought this show'
                ], 400);
            }

            if (empty($show) || $show->personLimit === $countTickets) {
                Log::error('this show already reach a limit of participants');
                return response()->json([
                    'message' => 'this show already reach a limit of participants'
                ], 400);
            }

            $key = Str::random(24);

            $this->ticketModel->show_id = $showId;
            $this->ticketModel->key = $key;
            $this->ticketModel->save();

            $ticketId = $this->ticketModel->where('key', $key)->first();

            return response()->json([
                'message' => 'ticket created with success',
                'ticketId' => $ticketId->id
            ]);
        } catch (DomainException $err) {
            Log::error($err);
            return response()->json(['error' => 'error to create a new Ticket'], 400);
        }
    }
}
