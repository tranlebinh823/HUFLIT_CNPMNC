<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', // Đảm bảo rằng bạn đã thêm trường user_id vào đây
        'message', // Các trường khác mà bạn cho phép mass assignment
        // ...
    ];
}
