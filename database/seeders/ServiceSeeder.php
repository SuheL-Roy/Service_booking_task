<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $services = [
            [
                'name' => 'Complete Blood Count (CBC)',
                'description' => 'A test to evaluate overall health and detect a variety of disorders.',
                'price' => 300.00
            ],
            [
                'name' => 'Blood Glucose Test',
                'description' => 'Measures the amount of glucose in your blood.',
                'price' => 150.00
            ],
            [
                'name' => 'Liver Function Test (LFT)',
                'description' => 'Checks for liver damage or disease.',
                'price' => 500.00
            ],
            [
                'name' => 'Kidney Function Test (KFT)',
                'description' => 'Evaluates how well your kidneys are working.',
                'price' => 450.00
            ],
            [
                'name' => 'Lipid Profile',
                'description' => 'Measures cholesterol and triglyceride levels.',
                'price' => 400.00
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
