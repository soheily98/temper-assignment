<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

/**
 * Class Record
 * @package App\Models
 * @property Carbon $created_at
 */
class Record extends Model
{
    protected $connection = null;

    protected $fillable = [
        'user_id', 'onboarding_percentage', 'count_applications', 'count_accepted_applications', 'created_at',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'onboarding_percentage' => 'integer',
        'count_applications' => 'integer',
        'count_accepted_applications' => 'integer',
    ];

    protected $dateFormat = "Y-m-d";
}
