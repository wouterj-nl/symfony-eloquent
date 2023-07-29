<?php

namespace App\Seed;

use App\Factory\TalkFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use WouterJ\EloquentBundle\Seeder;

class TalkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TalkFactory::new()->count(3)->create();

        TalkFactory::new()->count(2)->accepted()->create();
    }
}
