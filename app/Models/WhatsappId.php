<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhatsappId extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'whatsapp_id',
        'name',
        'notes_1',
        'notes_2',
        'notes_3',
        'notes_4',
        'notes_5',
        'notes_6',
        'notes_7',
        'notes_8',
        'notes_9',
        'notes_10',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
