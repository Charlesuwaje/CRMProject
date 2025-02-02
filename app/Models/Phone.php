<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $table = 'phones';
    protected $primaryKey = 'phone_id';


    protected $fillable = [
        'country_code',
        'std_code',
        'phone_no',
    ];

    // public function contacts()
    // {
    //     return $this->belongsToMany(Contact::class, 'contact_phone');
    // }
    public function contacts()
    {
        return $this->belongsToMany(Contact::class, 'contact_phone', 'phone_id', 'contact_id');
    }
}
