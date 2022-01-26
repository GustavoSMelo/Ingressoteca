<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnouncerModel extends Model
{
    /**
     * @var string
     */
    protected $table = 'announcers';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'password'
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
     * Method to create a relationship between announcer and show in php level
     *
     * @return void
     */
    public function show (): void
    {
        $this->hasMany(ShowModel::class);
    }

    use HasFactory;
}
