<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $primaryKey = 'company_id';
    protected $table = 'company';

    protected $fillable = [
        'company_name',
        'created_by',
        'modified_by',
    ];


    public function users()
    {
        return $this->hasMany(User::class, 'company_id', 'company_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'user_id');
    }

    public function modifiedBy()
    {
        return $this->belongsTo(User::class, 'modified_by', 'user_id');
    }
}
