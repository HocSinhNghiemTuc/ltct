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
            ['id'=>'20','name' => 'admin', 'email' => 'example@gmail.com','password' => '$2y$10$.jWZ.STpWtmF04ImR6YCke91VDfecF5LwgRPP2HNyZrI5peBhabN.'],
        ]);
        DB::table('roles')->insert([
            ['id' => '20', 'name' => 'admin', 'display_name' => 'Quan tri he thong'],
        ]);
        DB::table('role_user')->insert([
            ['user_id' => '20','role_id' => '20'],
        ]);
    }
}
