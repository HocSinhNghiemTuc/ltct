<?php

namespace Modules\Contact\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ContactDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([[
            'contact_name'=>'Facebook',
            'contact_value'=>'https://facebook.com',
            'icon'=>'fab fa-facebook',
            'color'=>'#0000FF'
        ],[
            'contact_name'=>'Youtube',
            'contact_value'=>'https://youtube.com',
            'icon'=>'fab fa-youtube',
            'color'=>'#FF0000'
        ]]);
        DB::table('feedbacks')->insert([[
            'email'=>'hieu.jno1@gmail.com',
            'content'=>'Tôi cần chữ to hơn nữa',
            'created_at'=> now()
        ],[
            'email'=>'hieu.jno1@gmail.com',
            'content'=>'Tôi cần chữ to hơn nữaTôi cần chữ to hơn nữaTôi cần chữ to hơn nữaTôi cần chữ to hơn nữaTôi cần chữ to hơn nữaTôi cần chữ to hơn nữaTôi cần chữ to hơn nữaTôi cần chữ to hơn nữaTôi cần chữ to hơn nữaTôi cần chữ to hơn nữaTôi cần chữ to hơn nữa',
            'created_at'=> now()
        ]]);
    }
}
