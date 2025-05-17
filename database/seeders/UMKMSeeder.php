<?php

namespace Database\Seeders;

use App\Models\UMKM;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UMKMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UMKM::insert([
            [
                'name' => 'Warung Tegal',
                'type' => 'Food & Beverage',
                'status' => 'Active',
                'address' => 'Jl. Sudirman No. 10, Jakarta',
                'location_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126914.73821487906!2d106.78305935619584!3d-6.214856821385137!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f10a5e3b7b8b%3A0x80c23839c73b1b9d!2sWarung%20Tegal!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid',
                'email' => 'warungtegal@gmail.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Batik Pekalongan',
                'type' => 'Textile',
                'status' => 'Pending',
                'address' => 'Jl. Batik No. 5, Pekalongan',
                'location_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126914.73821487906!2d106.78305935619584!3d-6.214856821385137!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f10a5e3b7b8b%3A0x80c23839c73b1b9d!2sBatik%20Pekalongan!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid',
                'email' => 'batikpekalongan@gmail.com',
                'password' => Hash::make('password456'),
            ]
        ]);
    }
}
