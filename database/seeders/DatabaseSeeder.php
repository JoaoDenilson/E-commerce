<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Enumerable;
use Ramsey\Uuid\Type\Decimal;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'discount' => Enumerable::range(1,1),
            'quantityProduct' => Enumerable::range(1,1),
            'valueProduct' => Decimal::range(4),
            'name' => Str::random(10),
            'url_image' => Str::random(10),
            'description' => Str::random(10),
            'password' => Hash::make('password'),
        ]);
    }
}
