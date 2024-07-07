<?php

namespace Database\Seeders;

use App\Models\MandatorySaving;
use Illuminate\Database\Seeder;
use App\Models\MySaving;
use App\Models\User;
use GuzzleHttp\Promise\Create;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();


        MandatorySaving::create([
            'user_id' => '1',
            'date' => now()->toDateString(),
            'amount' => intval('100000'), // Mengonversi '100000' menjadi bilangan bulat
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        MandatorySaving::create([
            'user_id' => '2',
            'date' => now()->toDateString(),
            'amount' => intval('100000'), // Mengonversi '100000' menjadi bilangan bulat
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        MandatorySaving::create([
            'user_id' => '3',
            'date' => now()->toDateString(),
            'amount' => intval('100000'), // Mengonversi '100000' menjadi bilangan bulat
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        MandatorySaving::create([
            'user_id' => '4',
            'date' => now()->toDateString(),
            'amount' => intval('100000'), // Mengonversi '100000' menjadi bilangan bulat
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        MandatorySaving::create([
            'user_id' => '1',
            'date' => now()->toDateString(),
            'amount' => intval('100000'), // Mengonversi '100000' menjadi bilangan bulat
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        MandatorySaving::create([
            'user_id' => '5',
            'date' => now()->toDateString(),
            'amount' => intval('100000'), // Mengonversi '100000' menjadi bilangan bulat
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        MandatorySaving::create([
            'user_id' => '6',
            'date' => now()->toDateString(),
            'amount' => intval('100000'), // Mengonversi '100000' menjadi bilangan bulat
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        MandatorySaving::create([
            'user_id' => '7',
            'date' => now()->toDateString(),
            'amount' => intval('100000'), // Mengonversi '100000' menjadi bilangan bulat
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        MandatorySaving::create([
            'user_id' => '8',
            'date' => now()->toDateString(),
            'amount' => intval('100000'), // Mengonversi '100000' menjadi bilangan bulat
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        MandatorySaving::create([
            'user_id' => '9',
            'date' => now()->toDateString(),
            'amount' => intval('100000'), // Mengonversi '100000' menjadi bilangan bulat
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        MandatorySaving::create([
            'user_id' => '10',
            'date' => now()->toDateString(),
            'amount' => intval('100000'), // Mengonversi '100000' menjadi bilangan bulat
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        MySaving::create([
            'user_id' => '1',
            'date' => now()->toDateString(),
            'amount' => intval('100000'), // Mengonversi '100000' menjadi bilangan bulat
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        MySaving::create([
            'user_id' => '2',
            'date' => now()->toDateString(),
            'amount' => intval('100000'), // Mengonversi '100000' menjadi bilangan bulat
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        MySaving::create([
            'user_id' => '3',
            'date' => now()->toDateString(),
            'amount' => intval('100000'), // Mengonversi '100000' menjadi bilangan bulat
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        MySaving::create([
            'user_id' => '4',
            'date' => now()->toDateString(),
            'amount' => intval('100000'), // Mengonversi '100000' menjadi bilangan bulat
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        MySaving::create([
            'user_id' => '1',
            'date' => now()->toDateString(),
            'amount' => intval('100000'), // Mengonversi '100000' menjadi bilangan bulat
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        MySaving::create([
            'user_id' => '5',
            'date' => now()->toDateString(),
            'amount' => intval('100000'), // Mengonversi '100000' menjadi bilangan bulat
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        MySaving::create([
            'user_id' => '6',
            'date' => now()->toDateString(),
            'amount' => intval('100000'), // Mengonversi '100000' menjadi bilangan bulat
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        MySaving::create([
            'user_id' => '7',
            'date' => now()->toDateString(),
            'amount' => intval('100000'), // Mengonversi '100000' menjadi bilangan bulat
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        MySaving::create([
            'user_id' => '8',
            'date' => now()->toDateString(),
            'amount' => intval('100000'), // Mengonversi '100000' menjadi bilangan bulat
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        MySaving::create([
            'user_id' => '9',
            'date' => now()->toDateString(),
            'amount' => intval('100000'), // Mengonversi '100000' menjadi bilangan bulat
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        MySaving::create([
            'user_id' => '10',
            'date' => now()->toDateString(),
            'amount' => intval('100000'), // Mengonversi '100000' menjadi bilangan bulat
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        // User::create([
        //     'name'=>'Nuryaman',
        //     'username'=>'Yaman',
        //     'email'=>'nury4m4nn@gmail.com',
        //     'password'=>bcrypt('12345678')
        // ]);


    }
}