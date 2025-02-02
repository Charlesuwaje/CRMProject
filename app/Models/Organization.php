<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Organization extends Model
{
    use HasFactory;
    protected $primaryKey = 'organization_id';

    protected $fillable = [
        'name',
        'annual_revenue',
        'estd_date',
        'legal_structure',
        'type_of_business',
        'occupation',
        'employee_count',
        'description',
    ];

    public function contacts()
    {
        return $this->belongsTo(Contact::class, 'organization_id');
    }
    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id');
    }
    public function organizationContact()
    {
        return $this->belongsTo(OrganizationContact::class, 'organization_id');
    }
    public function contactPhones()
    {
        return $this->belongsTo(ContactPhone::class, 'contact_id');
    }
    public function contactEmail()
    {
        return $this->belongsTo(ContactEmail::class, 'contact_id');
    }
}
