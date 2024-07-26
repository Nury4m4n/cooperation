<?php

namespace Database\Seeders;

use App\Models\MandatorySaving;
use Illuminate\Database\Seeder;
use App\Models\MySaving;
    use App\Models\User;
use App\Models\Customer;
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
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Nuryaman',
            'email' => 'nuryaman@gmail.com',
            'password' => bcrypt('12345678'),
            'is_admin' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        // User::create([
        //     'name' => 'Agus',
        //     'email' => 'agus@gmail.com',
        //     'password' => bcrypt('12345678'),
        //     // 'is_admin' => false,
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
        Customer::create([
            'code' => 'N001',
            'name' => 'Nuryaman',
            'gender' => 'Laki-Laki',
            'phone' => '085797563983',
            'address' => 'Bandung',
            'user_id' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // MandatorySaving::create([
        //     'customer_id' => '1',
        //     'date' => now()->toDateString(),
        //     'amount' => intval('100000'), // Mengonversi '100000' menjadi bilangan bulat
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // MandatorySaving::create([
        //     'customer_id' => '2',
        //     'date' => now()->toDateString(),
        //     'amount' => intval('100000'), // Mengonversi '100000' menjadi bilangan bulat
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // MySaving::create([
        //     'customer_id' => '1',
        //     'date' => now()->toDateString(),
        //     'amount' => intval('100000'), // Mengonversi '100000' menjadi bilangan bulat
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // MySaving::create([
        //     'customer_id' => '1',
        //     'date' => now()->toDateString(),
        //     'amount' => intval('100000'), // Mengonversi '100000' menjadi bilangan bulat
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // MySaving::create([
        //     'customer_id' => '2',
        //     'date' => now()->toDateString(),
        //     'amount' => intval('100000'), // Mengonversi '100000' menjadi bilangan bulat
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

    }
}