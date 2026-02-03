<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = [
            [
                'section_id' => 1,
                'title' => 'Service Management',
                'sub_title' => 'Service Management commands for Apache',
                'slug' => 'service-management',
                'content' => 'here comes the json content',
                'sort_order' => 1,
                'is_published' => true,
                'is_public' => false,
            ],
            [
                'section_id' => 1,
                'title' => 'Configurations',
                'sub_title' => 'Best Practices',
                'slug' => 'configurations',
                'content' => 'here comes the json content',
                'sort_order' => 2,
                'is_published' => true,
                'is_public' => false,
            ],
            // [
            //     'section_id' => 2,
            //     'title' => 'Installing NGINX on Ubuntu',
            //     'slug' => 'installing-nginx-on-ubuntu',
            //     'sort_order' => 1,
            //     'is_published' => true,
            // ],
            // [
            //     'section_id' => 2,
            //     'title' => 'Setting Up Reverse Proxy',
            //     'slug' => 'setting-up-reverse-proxy',
            //     'sort_order' => 2,
            //     'is_published' => true,
            // ],
        ];

        if(DB::table('articles')->count() === 0){
            DB::table('articles')->insert($articles);
        }
    }
}
