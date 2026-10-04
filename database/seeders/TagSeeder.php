<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $param = [
            'name' => '質問',
        ];
        DB::table('tags')->insert($param);
        
        $param = [
            'name' => '要望',
        ];
        DB::table('tags')->insert($param);
        
        $param = [
            'name' => '不具合報告',
        ];
        DB::table('tags')->insert($param);
        
        $param = [
            'name' => 'ご意見',
        ];
        DB::table('tags')->insert($param);

        $param = [
            'name' => 'その他',
        ];
        DB::table('tags')->insert($param);
    }
}
