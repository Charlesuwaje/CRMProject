<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $primaryKey = 'contact_id';
    protected $table = 'contacts';
    protected $fillable = [
        'first_name',
        'last_name',
        'source',
        'occupation',
        'dob',
        'gender',
        'description',
        'organization_id',
    ];

    public function organizationContact()
    {
        return $this->belongsTo(OrganizationContact::class, 'contact_id');
    }

    public function ContactPhone()
    {
        return $this->belongsTo(ContactPhone::class, 'contact_id');
    }

    // public function organization()
    // {
    //     return $this->belongsToMany(Organization::class, 'contact_email', 'contact_id', 'email_id');
    // }
    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id');
    }
    public function contactEmail()
    {
        return $this->belongsTo(ContactEmail::class, 'contact_id');
    }

}
