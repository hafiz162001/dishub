<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        Post::create([
            'title' => 'Belajar Laravel Dasar',
            'content' => 'Ini adalah konten artikel tentang Laravel dasar.'
        ]);

        Post::create([
            'title' => 'Belajar REST API',
            'content' => 'Kita akan membuat API sederhana pakai Laravel.'
        ]);
    }
}