<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPhone extends Model
{
    use HasFactory;

    protected $table = 'contact_phone';
    protected $primaryKey = 'contact_phone_id';
    protected $fillable = [
        'contact_id',
        'phone_id',
        'contact_phone_type',
        'is_primary_phone',
    ];

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }

    public function phone()
    {
        return $this->belongsTo(Phone::class, 'phone_id');
    }
}
