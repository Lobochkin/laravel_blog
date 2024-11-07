<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property float $water
 * @property float $warming
 * @property float $electric
 */
class Price extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['water', 'warming', 'electric'];
}
