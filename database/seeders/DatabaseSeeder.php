<?php

namespace Database\Seeders;

use App\Models\AboutStat;
use App\Models\PricingTier;
use App\Models\SaaSPlatform;
use App\Models\SuccessStory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. About Stats
        AboutStat::create([
            'key' => 'projects',
            'value' => 19,
            'label' => 'Successful Projects'
        ]);
        AboutStat::create([
            'key' => 'saas',
            'value' => 34,
            'label' => 'SaaS Implementations'
        ]);

        // 2. SaaS Platforms
        SaaSPlatform::create([
            'title' => 'HappyQ',
            'category' => 'Queue Management',
            'description' => 'Revolutionize your customer flow with our intelligent queue management system. Reduce wait times, improve satisfaction, and gather valuable analytics.',
            'icon' => 'Clock'
        ]);
        SaaSPlatform::create([
            'title' => 'Online Booking',
            'category' => 'Scheduling',
            'description' => 'A robust, customizable booking engine for salons, clinics, and service professionals. Features automated reminders and staff management.',
            'icon' => 'CalendarCheck'
        ]);
        SaaSPlatform::create([
            'title' => 'Fleet Management',
            'category' => 'Logistics',
            'description' => 'Track your vehicles in real-time, optimize routes, monitor fuel consumption, and schedule preventative maintenance—all from one dashboard.',
            'icon' => 'Truck'
        ]);
        SaaSPlatform::create([
            'title' => 'Insurance Recovery',
            'category' => 'FinTech',
            'description' => 'Streamline the claims recovery process with automated data extraction, intelligent routing, and comprehensive reporting tools.',
            'icon' => 'ShieldCheck'
        ]);

        // 3. Success Stories
        SuccessStory::create([
            'title' => 'Global Retail Logistics',
            'category' => 'Fleet Management',
            'description' => 'Implemented our customized fleet management solution for a major retailer, reducing delivery delays by 35% and fuel consumption by 15%.',
            'image_class' => 'bg-gradient-to-br from-blue-400 to-indigo-600'
        ]);
        SuccessStory::create([
            'title' => 'National Health Clinics',
            'category' => 'Online Booking',
            'description' => 'Deployed a HIPAA-compliant online booking system across 50+ clinics, improving patient intake efficiency and reducing no-shows.',
            'image_class' => 'bg-gradient-to-br from-emerald-400 to-teal-600'
        ]);
        SuccessStory::create([
            'title' => 'City DMV Operations',
            'category' => 'HappyQ',
            'description' => 'Revamped the queue system for municipal services, decreasing average wait times from 2 hours to 45 minutes with SMS ticketing.',
            'image_class' => 'bg-gradient-to-br from-primary to-emerald-500'
        ]);
        SuccessStory::create([
            'title' => 'InsureCo Digital Transformation',
            'category' => 'Consulting & Recovery',
            'description' => 'A complete overhaul of legacy claims processing, integrating our Insurance Recovery System to automate 60% of manual data entry.',
            'image_class' => 'bg-gradient-to-br from-purple-400 to-pink-600'
        ]);

        // 4. Pricing Tiers
        PricingTier::create([
            'name' => 'HappyQ Service',
            'price' => '₹500',
            'period' => '/ month',
            'description' => 'Essential queue management for single-location businesses.',
            'recommended' => false,
            'features' => [
                'Unlimited Tickets',
                'SMS Notifications (₹1/ticket)',
                'Unique Patient Add-on (₹1/patient)',
                'Basic Analytics',
                'Email Support'
            ]
        ]);
        PricingTier::create([
            'name' => 'Online Booking',
            'price' => '₹999',
            'period' => '/ month',
            'description' => 'Everything you need to manage appointments and staff.',
            'recommended' => true,
            'features' => [
                'Unlimited Bookings',
                'Calendar Sync',
                'Automated Reminders',
                'Client Database',
                'Priority Support'
            ]
        ]);
        PricingTier::create([
            'name' => 'Custom Consulting',
            'price' => 'Custom',
            'period' => null,
            'description' => 'Tailored software solutions for enterprise needs.',
            'recommended' => false,
            'features' => [
                'Dedicated Project Manager',
                'Custom Architecture',
                'SLA Guarantees',
                'Full Source Code',
                '24/7 Phone Support'
            ]
        ]);
    }
}
