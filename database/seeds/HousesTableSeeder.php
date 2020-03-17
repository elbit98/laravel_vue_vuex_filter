<?php

use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class HousesTableSeeder extends CsvSeeder
{

    public function __construct()
    {
        $this->file = '/database/seeds/csvs/houses.csv';
        $this->tablename = 'houses';
        $this->delimiter = ',';
        $this->mapping = ['name', 'price', 'bedrooms', 'bathrooms', 'storeys', 'garages'];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Recommended when importing larger CSVs
        DB::disableQueryLog();
        parent::run();
    }
}
