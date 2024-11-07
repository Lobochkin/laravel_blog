<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property float $electric
 * @property float $hot_water
 * @property float $cold_water
 * @property string $date
 * @property string $total
 */
class Meter extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['electric', 'hot_water', 'cold_water', 'date', 'total'];
}
