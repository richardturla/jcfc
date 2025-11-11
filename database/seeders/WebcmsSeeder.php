<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Webcms;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;

class WebcmsSeeder extends Seeder
{
    public function run(): void
    {
        // Get the first user, or create one if it doesn’t exist
        $user = User::first() ?? User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        // Create 5 sample WebCMS posts
        for ($i = 1; $i <= 5; $i++) {
            Webcms::create([
                'user_id' => $user->id,
                'is_published' => true,
                'section' => 'News',
                'tag' => 'Update',
                'title' => 'Sample WebCMS Post ' . $i,
                'featured' => 'This is a featured highlight for post ' . $i,
                'body' => 'This is a sample content body for WebCMS post number ' . $i . '. It contains example text to populate the table.',
                'cover_image' => 'uploads/sample' . $i . '.jpg',
                'slug' => Str::slug('sample-webcms-post-' . $i),
                'posted_at' => Carbon::now()->subDays($i),
            ]);
        }
    }
}
