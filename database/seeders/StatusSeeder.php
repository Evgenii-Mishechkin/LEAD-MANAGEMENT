<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    public function run()
    {
        Status::create(['name' => 'Новый']);
        Status::create(['name' => 'В работе']);
        Status::create(['name' => 'Завершен']);
    }
}
