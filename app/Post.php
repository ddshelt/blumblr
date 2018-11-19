<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Accessor - changes what's showed when the model shows 'title'
    public function getTitleAttribute($value) {
      return strToUpper($value);
    }

    //Mutator -changes what is saved to the database for 'user_id'
    public function setUserIdAttribute($value) {
      $this->attributes['user_id'] = \Auth::id() . $value;
    }

}
