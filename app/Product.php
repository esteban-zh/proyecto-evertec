<?php

namespace App;

use App\Scopes\AvailableScope;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'picture', 'price', 'enable', 'stock', 'status', 'description'
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new AvailableScope);
    }

    public function scopeAvailable($query)
    {
        $query->where('status', 'available');
    }


    public function scopeName($query, $name)
    {
        if ($name) {
            return $query->where('name', 'LIKE', "%$name%");
        }
    }
}
// class Flight extends Model
// {
//     use SoftDeletes;
// }
