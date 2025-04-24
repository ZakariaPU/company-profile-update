<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CateringOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'address',
        'phone',
        'instagram',
        'menu_type',
        'start_date',
        'end_date',
        'meal_types',
        'allergies',
        'notes',
        'status'
    ];

    protected $casts = [
        'meal_types' => 'array',
        'start_date' => 'date',
        'end_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Get the user that owns the order
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}