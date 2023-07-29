<?php

namespace App\Seed;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use WouterJ\EloquentBundle\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            TalkSeeder::class,
        ]);
    }
}
