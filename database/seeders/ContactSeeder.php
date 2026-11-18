<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::factory()->create([
            'name' => '田中太郎',
            'email' => 'admin@example.com',
            'tel' => '090-3456-7890',
            'content' => '資料をいただきたいです'
        ]);
    }
}
