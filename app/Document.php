<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
       public function Document_type()
    {
        return $this->belongsTo('App\Document_type', 'doctype_id');
    }
}
