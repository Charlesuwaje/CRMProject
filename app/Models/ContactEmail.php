<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactEmail extends Model
{
    use HasFactory;

    protected $table = 'contact_email';
    protected $primaryKey = 'contact_email_id';
    protected $fillable = [
        'contact_id',
        'email_id',
        'contact_email_type',
        'is_primary_email',
    ];

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id', 'contact_id');
    }

    public function emails()
    {
        return $this->belongsToMany(Email::class, 'contact_email', 'contact_id', 'email_id');
    }
    



}
