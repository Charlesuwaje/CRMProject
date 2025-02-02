<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    use HasFactory;

    protected $table = 'audit_logs';

    protected $fillable = [
        'action',
        // 'user_id',
        'entity',
        'entity_id',
        'request_data',
        'response_data',
        'ip_address',
        'user_agent',
    ];
}
