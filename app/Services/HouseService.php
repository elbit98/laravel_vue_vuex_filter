<?php

namespace App\Services;

use App\House;

class HouseService
{

    public function filter($data)
    {
        return House::select('*')
            ->name($data->name)
            ->filter([
                'bedrooms' => $data->bedrooms,
                'bathrooms' => $data->bathrooms,
                'storeys' => $data->storeys,
                'garages' => $data->garages,
            ])
            ->priceMinAndMax([
                'min' => $data->min_price,
                'max' => $data->max_price,
            ])
            ->get();
    }

}
