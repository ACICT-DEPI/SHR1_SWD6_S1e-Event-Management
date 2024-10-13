<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Country::create(['name'=>'Egypt']);
        Country::create(['name'=>'suadi aribia']);
        City::create(['country_id'=>1,'name'=>'cairo']);
        City::create(['country_id'=>1,'name'=>'Alexandria']);
        City::create(['country_id'=>1,'name'=>'Gada']);
        City::create(['country_id'=>2,'name'=>'Reyad']);
        City::create(['country_id'=>2,'name'=>'Madina']);
        City::create(['country_id'=>2,'name'=>'Aswan']);

        Tag::create(['name'=>'Laravel','slug'=>'laravel']);
        Tag::create(['name'=>'Vuejs','slug'=>'vue-js']);
        Tag::create(['name'=>'Livewire','slug'=>'livewire']);
    }
}
