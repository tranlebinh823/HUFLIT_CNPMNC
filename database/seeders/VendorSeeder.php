<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    /**
     * Run the seeder.
     */
    public function run()
    {
        $vendors = [
            [
                'banner' => 'banner_url_1',
                'shop_name' => 'Sample Shop 1',
                'phone' => '1234567890',
                'email' => 'sample1@example.com',
                'address' => '123 Sample St, Sample City 1',
                'description' => 'This is a sample shop 1.',
                'fb_link' => 'https://facebook.com/sample1',
                'tw_link' => 'https://twitter.com/sample1',
                'insta_link' => 'https://instagram.com/sample1',
                'category_shop_id' => 1, // Replace with the actual category ID
                'user_id' => 1, // Replace with the actual user ID
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'banner' => 'banner_url_2',
                'shop_name' => 'Sample Shop 2',
                'phone' => '9876543210',
                'email' => 'sample2@example.com',
                'address' => '456 Sample St, Sample City 2',
                'description' => 'This is a sample shop 2.',
                'fb_link' => 'https://facebook.com/sample2',
                'tw_link' => 'https://twitter.com/sample2',
                'insta_link' => 'https://instagram.com/sample2',
                'category_shop_id' => 2, // Replace with the actual category ID
                'user_id' => 1, // Replace with the actual user ID
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more data as needed
        ];

        foreach ($vendors as $vendorData) {
            Vendor::create($vendorData);
        }
    }
}
