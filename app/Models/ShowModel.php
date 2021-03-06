<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShowModel extends Model
{
    /**
     * @var string
     */
    protected $table = 'show';

    /**
     * @var integer
     */
    protected $perPage = 10;

    /**
     * @var array
     */
    protected $fillable = [
        'show_name',
        'show_date',
        'start_time',
        'end_time',
        'description',
        'category',
        'person_limit',
        'announcer_id'
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
    public function announcer(): void
    {
        $this->belongsTo(AnnouncerModel::class);
    }

    /**
     * Method to define relationship between show and ticket in php level
     *
     * @return void
     */
    public function ticket(): void
    {
        $this->hasMany(TicketModel::class);
    }

    use HasFactory;
}
