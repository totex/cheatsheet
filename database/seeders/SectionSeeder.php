<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $sections = [
            [
                'title' => 'Apache Web Server',
                'slug' => 'apache-web-server',
                'sort_order' => 1,
            ],
            [
                'title' => 'NGINX Web Server',
                'slug' => 'nginx-web-server',
                'sort_order' => 2,
            ],
        ];

        if(DB::table('sections')->count() === 0){
            DB::table('sections')->insert($sections);
        }
    }
}
