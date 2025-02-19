<?php

namespace Database\Seeders;

use App\Models\SponsorshipPackage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class sponsorship_packages extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        SponsorshipPackage::create([
            'name' => 'Gold Sponsor',
            'price' => 10000.00,
            'description' => 'Premium visibility and branding',
            'benefits' => [
                'Logo placement on all event materials',
                'Dedicated booth space at the conference',
                'Opportunity to give a keynote speech',
                'Featured in press releases and social media promotions',
            ],
        ]);

        SponsorshipPackage::create([
            'name' => 'Silver Sponsor',
            'price' => 5000.00,
            'description' => 'Good visibility and branding',
            'benefits' => [
                'Logo placement on select event materials',
                'Shared booth space at the conference',
                'Recognition during sessions',
                'Inclusion in event-related social media posts',
            ],
        ]);

        SponsorshipPackage::create([
            'name' => 'Bronze Sponsor',
            'price' => 2500.00,
            'description' => 'Basic visibility and branding',
            'benefits' => [
                'Logo placement on the conference website',
                'Recognition in the event program',
                'Inclusion in the thank-you email sent to attendees',
            ],
        ]);
    }
}
