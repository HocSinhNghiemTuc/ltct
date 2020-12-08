<?php

namespace Modules\Role\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RoleDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'admin', 'email' => 'example@gmail.com','password' => '$2y$10$.jWZ.STpWtmF04ImR6YCke91VDfecF5LwgRPP2HNyZrI5peBhabN.'],
        ]);
    }
}
