<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleBlockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articleBlocks = [
            [
                'article_id' => 1,
                'title' => 'Introduction',
                'type' => 'text',
                'content' => 'Practical Apache (Ubuntu) command list.',
                'sort_order' => 1,
            ],
            [
                'article_id' => 1,
                'title' => 'Install',
                'type' => 'code',
                'content' => 'sudo apt update && sudo apt upgrade -y \n
                sudo apt install apache2',
                'sort_order' => 2,
            ],
            [
                'article_id' => 1,
                'title' => 'Check Status',
                'type' => 'code',
                'content' => 'sudo systemctl status apache2',
                'sort_order' => 3,
            ],
            [
                'article_id' => 1,
                'title' => 'Start',
                'type' => 'code',
                'content' => 'sudo systemctl start apache2',
                'sort_order' => 4,
            ],
        ];

        if(DB::table('article_blocks')->count() === 0){
            DB::table('article_blocks')->insert($articleBlocks);
        }
    }
}
