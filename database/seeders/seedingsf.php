<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class seedingsf extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seedings')->insert([
            'name'=>Str::random(10),
            'email'=>Str::random(5).'@gmail.com'
        ]);
    }
}
 