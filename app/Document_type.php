<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document_type extends Model
{
        public function Document()
    {
        return $this->hasMany('App\Document');
    }
}
