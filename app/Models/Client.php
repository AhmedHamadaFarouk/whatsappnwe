<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'email',
        'phone',
        'phone_2',
        'url_facebook',
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

    public function whatsappIdApi()
    {
        return $this->hasOne(WhatsappId::class,'client_id');
    }
}
