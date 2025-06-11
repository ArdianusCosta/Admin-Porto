<?php

namespace Database\Seeders;

use App\Models\Home;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $sourcePath = database_path('seeders/home/home.jpg');
        if (!file_exists($sourcePath)) {
            throw new \Exception("File tidak ditemukan: $sourcePath");
        }
        $filename = 'home/home_' . Str::random(8) . '.jpg';
        Storage::disk('public')->put(
            $filename,
            file_get_contents($sourcePath)
        );

        Home::create([
            'judul' => 'Hai, Kenalin Saya Costa',
            'isi' => 'Saya seorang full stack web developer yang suka bikin hal-hal keren dan bermanfaat lewat kode. Mulai dari tampilan depan yang menarik sampai ke sistem backend yang solid, saya menikmati proses membangun aplikasi web dari awal sampai jadi. Di sini, kamu bisa lihat beberapa proyek yang pernah saya kerjakan. Saya percaya bahwa setiap baris kode punya cerita. Dan yaa portofolio ini adalah tempat saya berbagi cerita itu. Terima kasih sudah mampir. Kalau kamu tertarik ngobrol atau kerja bareng, jangan ragu untuk hubungi saya ya!',
            'foto_home' => $filename,
        ]);
    }
}
