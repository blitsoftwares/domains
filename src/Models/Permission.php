<?php

namespace Blit\Domains\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Permission extends Model {

    protected $fillable = [
      'domain_id','name','description'
    ];

}