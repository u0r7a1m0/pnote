<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    public function run()
    {
        $tags = [
            ['name' => 'Ruby'],
            ['name' => 'PHP'],
            ['name' => 'JavaScript'],
            ['name' => 'Laravel'],
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}

