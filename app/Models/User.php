<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'user_id';
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];
    protected $fillable = [
        'first_name',
        'last_name',
        'user_name',
        'email',
        'password',
        'company_id',
        'created_by',
        'modified_by',
        'is_account_expired',
        'is_account_locked',
        'is_active',
        'is_credentials_expired',
        'last_password_reset_date',
        'mobile_number',
        'user_profile_photo',
        'zone_id',
        'visibility_group_id',
        'userset_id',
        'dob',
        'security_question',
        'security_answer',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function createdContacts()
    {
        return $this->hasMany(Contact::class, 'created_by');
    }
    // public function company()
    // {
    //     return $this->belongsTo(Company::class, 'company_id', 'company_id');
    // }

    public function company()
{
    return $this->belongsTo(Company::class);
}

    public function modifiedContacts()
    {
        return $this->hasMany(Contact::class, 'modified_by');
    }
}
