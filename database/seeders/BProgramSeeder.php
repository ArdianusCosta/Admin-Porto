<?php

namespace Database\Seeders;

use App\Models\Bprogram;
use Illuminate\Database\Seeder;

class BProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bprograms = [
            'Android Native',
            'Angular',
            'Bootstrap',
            'C++',
            'CodeIgniter',
            'CSS',
            'Dart',
            'Django',
            'Echo',
            'Express.js',
            'FastAPI',
            'Fastify',
            'Flask',
            'Flutter',
            'Gin',
            'Go',
            'HTML',
            'Ionic',
            'iOS Native',
            'Java',
            'JavaScript',
            'jQuery',
            'Kotlin',
            'Laravel',
            'NestJS',
            'Next.js',
            'Nuxt.js',
            'PHP',
            'Python',
            'React Native',
            'React.js',
            'Ruby',
            'Ruby on Rails',
            'Rust',
            'Spring Boot',
            'Svelte',
            'Swift',
            'Symfony',
            'Tailwind',
            'TypeScript',
            'Vue.js',
            'Xamarin',
        ];

        foreach ($bprograms as $bprogram) {
            Bprogram::create([
                'bahasa_pemrograman' => $bprogram,
            ]);
        }
    }
}
