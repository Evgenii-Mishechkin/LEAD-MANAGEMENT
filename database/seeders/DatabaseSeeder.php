<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Database\Seeders\StatusSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(StatusSeeder::class);
    }
}
