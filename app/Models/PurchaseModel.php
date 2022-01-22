<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseModel extends Model
{
    /**
     * @var string
     */
    protected $table = 'purchase';

    /**
     * @var array
     */
    protected $fillables = [
        'showId',
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
    public function user(): void
    {
        $this->belongsTo(UserModel::class);
    }

    /**
     * Method to define relationship between show and ticket in php level
     *
     * @return void
     */
    public function ticket(): void
    {
        $this->hasOne(TicketModel::class);
    }

    use HasFactory;
}
