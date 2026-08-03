<?php

namespace Tests\Feature;

use App\Models\BukuTamu;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BukuTamuFeedbackTest extends TestCase
{
    use RefreshDatabase;

    public function test_feedback_can_be_saved_after_buku_tamu_submission(): void
    {
        $bukuTamu = BukuTamu::create([
            'identitas' => '1234567890',
            'instansi_alamat' => 'Dinas Arpus',
            'keperluan' => 'Kunjungan',
            'nama' => 'Test User',
            'jenis_kelamin' => 'Laki-laki',
            'anda_sendirian' => 'Hanya saya',
            'usia' => 25,
        ]);

        $response = $this->post('/bukutamu/feedback', [
            'latest_buku_tamu_id' => $bukuTamu->id,
            'feedback_rating' => 5,
            'feedback_message' => 'Sangat membantu',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('feedback', [
            'buku_tamu_id' => $bukuTamu->id,
            'rating' => 5,
            'feedback' => 'Sangat membantu',
            'status' => 'baru',
        ]);
    }
}
