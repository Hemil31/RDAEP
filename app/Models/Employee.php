<?php

namespace App\Models;

use App\GenderEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{

    use SoftDeletes;
    protected $table = 'employees';

    /**
     * Summary of fillable
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'country_code',
        'mobile_number',
        'address',
        'gender',
        'hobbies',
        'photo',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'hobbies' => 'array',
            'gender' => GenderEnum::class,
        ];
    }
}
