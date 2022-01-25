<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketModel extends Model
{
    /**
     * @var string
     */
    protected $table = 'ticket';

    /**
     * @var array
     */
    protected $fillable = [
        'show_id',
        'key'
    ];

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var bool
     */
    protected $timestamp = true;

    /**
     * Method to define relationship between show and announcer in php level
     *
     * @return void
     */
    public function show(): void
    {
        $this->belongsTo(ShowModel::class);
    }

    /**
     * Method to define relationship between show and ticket in php level
     *
     * @return void
     */
    public function purchase(): void
    {
        $this->hasOne(PurchaseModel::class);
    }

    use HasFactory;
}
