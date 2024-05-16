<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receptions extends Model
{
    use HasFactory;
    protected $table = 'receptions';

    protected $fillable = [
        'environment',
        'file_number',
        'format_id',
        'quantity',
        'delivered_by',
        'received_by',
        'package_id',
        'typed_by',
        'typed_date',
        'type',
        'return_date',
        'returned_by'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'delivered_by', 'id');
    }

    public function bases(){
        return $this->belongsTo(Base::class, 'format_id', 'id');
    }
}
