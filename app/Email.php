<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Eloquent;

class Email extends Eloquent
{
    //
    protected $table = 'emails';

    protected $fillable = [
        'from'
    ];

    protected $hidden = [
        'type', 'updated_at', 'is_draft'
    ];

    public function type()
    {
        return $this->hasOne(Type::class);
    }

}
