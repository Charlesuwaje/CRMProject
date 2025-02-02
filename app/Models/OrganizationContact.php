<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationContact extends Model
{
    use HasFactory;

    protected $table = 'organization_contact';
    protected $primaryKey = 'organization_contact_id';
    protected $fillable = [
        'organization_id',
        'contact_id',
        'is_primary_contact',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id', 'organization_id');
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id', 'contact_id');
    }
}
