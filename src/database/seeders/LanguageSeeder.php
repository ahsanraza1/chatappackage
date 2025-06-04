<?php

namespace Database\Seeders;

use ahsanraza1\builtinchat\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Language::insert(
            [
                ["title"=>"English", "code"=>"en"],
                ["title"=>"Urdu", "code"=>"ur"],
                ["title"=>"Arabic", "code"=>"ar"],
            ]
        );
    }
}
