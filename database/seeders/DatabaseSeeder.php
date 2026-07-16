<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Define our legendary JDM tuning labels
        $tags = [
            'JDM Spec',
            'Twin Turbo',
            'Rotary Engine',
            'All-Wheel Drive',
            'Rear-Wheel Drive',
            'Naturally Aspirated',
            'Stanced',
            'Track Ready',
            'Time Attack'
        ];

        foreach ($tags as $tag) {
            DB::table('tags')->insert([
                'name' => $tag,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ]);
        };
    }
}
