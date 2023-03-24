<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Profileseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //admin
        Profile::factory()->create([
            'user_id' => 1
        ]);

        //Vendor
        Profile::factory()->create([
            'user_id' => 2
        ]);

        Profile::factory()->create([
            'user_id' => 3
        ]);
    }
}
