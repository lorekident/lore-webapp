<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'dob' => 'datetime',
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'child_name', 'age', 'gender', 'dob', 'school_name', 'year_level', 'allergies',
        'guardian_name', 'guardian_phone', 'guardian_email', 'address', 'city', 'emergency_contact_name',
        'emergency_phone', 'relationship', 'inspiration', 'previous_business', 'hobbies', 'business_idea',
        'favorite_subject', 'aspiration', 'is_admin', 'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
