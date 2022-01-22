<?php

namespace App\Http\Controllers;

use App\Models\ShowModel;
use App\Models\TicketModel;
use DomainException;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class TicketController extends BaseController
{
    /**
     * @var TicketModel
     */
    private $ticketModel;

    /**
     * @var ShowModel
     */
    private $showModel;

    /**
     * @param TicketModel $ticketModel
     */
    public function __construct(TicketModel $ticketModel, ShowModel $showModel)
    {
        $this->ticketModel = $ticketModel;
        $this->showModel = $showModel;

        parent::__construct($this->ticketModel);
    }

    /**
     * @inheritDoc
     * @override
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $showId = $request->input('showId');
            $show = ShowModel::find($showId);

            $countTickets = $this->ticketModel->where('showId', $showId)->count();

            if (!$show || empty($show) || $show->personLimit >= $countTickets) {
                return response()->json([
                    'message' => 'this show already reach a limit of participants'
                ], 400);
            }

            $key = Str::random(24);

            $this->ticketModel->showId = $showId;
            $this->ticketModel->key = $key;
            $this->ticketModel->save();

            return response()->json([
                'message' => 'ticket created with success'
            ]);
        } catch (DomainException) {
            return throw new DomainException('error to create a new Ticket');
        }
    }
}
