<?php

namespace Database\Seeders;

use App\Models\UserSearchHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SearchHistoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        UserSearchHistory::create([
            'search_keyword' => 'sha',
            'search_result' => '2',
        ]);
        UserSearchHistory::create([
            'search_keyword' => 'sha',
            'search_result' => '3',
        ]);
        UserSearchHistory::create([
            'search_keyword' => 'rafi',
            'search_result' => '4',
        ]);
    }
}
