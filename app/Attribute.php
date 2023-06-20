<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
  public function options()
  {
    return $this->hasMany(AttributeOption::class);
  }
}
