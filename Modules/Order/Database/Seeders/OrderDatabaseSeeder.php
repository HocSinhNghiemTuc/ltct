<?php

namespace Modules\Order\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('orderstates')->insert([
            ['state_name'=>'Cho thanh toan'],
            ['state_name'=>'Da thanh toan'],
            ['state_name'=>'Huy don']
        ]);
        // $this->call("OthersTableSeeder");
    }
}
