<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerServiceModel extends Model
{
    use HasFactory;
    protected $table = 'customer_service';
    protected $casts = [
        'message' => 'array'
    ];

    protected $fillable = [
        'user_id',
        'message',
        'finalized',
    ];

}
