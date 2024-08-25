<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Support\Str;


class User extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use HasFactory, Notifiable, HasRoles, InteractsWithMedia, HasApiTokens;

    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
    'username',
    'first_name',
    'last_name',
    'phone_number',
    'dob',
    'gender',
    'identity_number',
    'status',
    'banned',
    'national_no',
    'email',
    'password',
    'nationality',
    'user_type',
    'attachments',
    // New fields
    'child_name',
    'age',
    'school_name',
    'std_year',
    'allergies',
    'parent_name',
    'parent_contact',
    'parent_email',
    'address',
    'city',
    'emergency_contact_name',
    'relationship',
    'emergency_contact_phone',
    'inspiration',
    'business_experience',
    'hobbies',
    'business_ideas',
    'subjects',
    'favourite_subject',
    'future_aspirations',
    'consent',
    'consent_date',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'otp',
    ];

    /**
     * The attributes that should be cast to native types.s
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['full_name'];

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function courtCases()
    {
        return $this->hasMany(CourtCase::class, 'user_id');
    }

    public function userProfile() {
        return $this->hasOne(UserProfile::class, 'user_id', 'id');
    }

    public function auditLogs()
    {
        return $this->hasMany(Audit::class);
    }

    public function generateVerificationCode()
    {
        $this->otp =  rand(1000, 9999);
        $this->save();

        return $this->otp;
    }

    public function sendVerificationCode($code)
    {
        return \Illuminate\Support\Facades\Mail::to($this->email)->send(new \App\Mail\VerificationCode($code));
    }

    public function isAdmin()
    {
        return $this->role === 'admin'; // Adjust this condition based on your user role structure
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Automatically generate UUIDs for new records
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }

}
