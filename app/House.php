<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $fillable = ['id', 'name', 'bedrooms', 'bathrooms', 'storeys', 'garages', 'price'];

    public function scopeName($query, $name)
    {
        if (!is_null($name)) {
            return $query->where('name', 'like', '%' . $name . '%');
        }

        return $query;
    }

    /**
     *  Filter fields: bedrooms, bathrooms, storeys, garages
     *
     * @param $query
     * @param $data
     * @return mixed
     */
    public function scopeFilter($query, $data)
    {
        foreach ($data as $field => $value) {
            if (!is_null($value) && $value > 0) {
                 $query->where($field, $value);
            }
        }

        return $query;
    }

    public function scopePriceMinAndMax($query, $prices)
    {

        if (!is_null($prices['min'])) {
            $query->where('price', '>=',$prices['min']);
        }

        if (!is_null($prices['max'])) {
            $query->where('price', '<=',$prices['max']);
        }

        return $query;
    }

}
