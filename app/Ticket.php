<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable=[
        'title', 'slug','body','user_id','responsible_user','file_name',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
