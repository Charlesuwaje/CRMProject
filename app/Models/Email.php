<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;

    protected $table = 'email';
    protected $primaryKey = 'email_id';


    protected $fillable = [
        'email',
    ];

    // public function contacts()
    // {
    //     return $this->belongsToMany(Contact::class, 'contact_email');
    // }
    public function contacts()
{
    return $this->belongsToMany(Contact::class, 'contact_email', 'email_id', 'contact_id');
}

}
