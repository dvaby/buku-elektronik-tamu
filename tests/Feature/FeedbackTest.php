<?php

namespace Tests\Feature;

use App\Models\BukuTamu;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FeedbackTest extends TestCase
{
    use RefreshDatabase;

    public function test_feedback_can_be_saved_after_buku_tamu_submission(): void
    {
        $response = $this->post(route('bukutamu.store'), [
            'identitas' => '1234567890',
            'no_hp' => '081234567890',
            'instansi_alamat' => 'Dinas Arsip',
            'keperluan' => 'Magang',
            'nama' => 'Davin',
            'pegawai_temui' => 'Pak Budi',
            'jenis_kelamin' => 'Laki-laki',
            'anda_sendirian' => 'Hanya saya',
            'usia' => 25,
            'feedback_rating' => 5,
            'feedback_message' => 'Sangat membantu',
        ]);

        $response->assertRedirect(route('bukutamu.create'));
        $this->assertDatabaseHas('feedback', [
            'rating' => 5,
            'feedback' => 'Sangat membantu',
        ]);
    }

    public function test_feedback_can_be_updated_from_dashboard(): void
    {
        $user = User::factory()->create();
        $bukuTamu = BukuTamu::create([
            'identitas' => '111',
            'instansi_alamat' => 'Dinas Arsip',
            'keperluan' => 'Kunjungan',
            'nama' => 'Ayu',
            'jenis_kelamin' => 'Perempuan',
            'anda_sendirian' => 'Hanya saya',
            'usia' => 23,
        ]);
        $feedback = Feedback::create([
            'buku_tamu_id' => $bukuTamu->id,
            'rating' => 3,
            'feedback' => 'Awal',
            'status' => 'baru',
        ]);

        $response = $this->actingAs($user)->put(route('dashboard.feedback.update', $feedback), [
            'rating' => 4,
            'feedback' => 'Sudah lebih baik',
            'status' => 'selesai',
        ]);

        $response->assertRedirect(route('dashboard'));
        $this->assertDatabaseHas('feedback', [
            'id' => $feedback->id,
            'rating' => 4,
            'feedback' => 'Sudah lebih baik',
            'status' => 'selesai',
        ]);
    }
}
