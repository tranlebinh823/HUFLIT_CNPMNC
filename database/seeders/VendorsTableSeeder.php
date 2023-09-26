<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the seeder.
     */
    public function run()
    {
        DB::table('vendors')->insert([
            'banner' => 'banner_url',
            'shop_name' => 'Sample Shop',
            'phone' => '1234567890',
            'email' => 'sample@example.com',
            'address' => '123 Sample St, Sample City',
            'description' => 'This is a sample shop.',
            'fb_link' => 'https://facebook.com/sample',
            'tw_link' => 'https://twitter.com/sample',
            'insta_link' => 'https://instagram.com/sample',
            'category_shop_id' => 1, // Replace with the actual category ID
            'user_id' => 1, // Replace with the actual user ID
            'status' => 1,
        ]);

        // Add more data as needed
    }
}
