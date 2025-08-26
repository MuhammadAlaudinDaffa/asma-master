<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AspirasiNotification extends Notification implements ShouldQueue
{
    use Queueable;

    // Properti untuk menyimpan data pengaduan yang akan dikirim
    public $pengaduan;
    public $statusBaru;
    public $komentar;

    /**
     * Buat instance notifikasi baru.
     *
     * @return void
     */
    public function __construct($pengaduan, $statusBaru, $komentar = null)
    {
        $this->pengaduan = $pengaduan;
        $this->statusBaru = $statusBaru;
        $this->komentar = $komentar;
    }

    /**
     * Tentukan saluran notifikasi.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Dapatkan representasi email dari notifikasi.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $subject = "Update Status Pengaduan: " . $this->pengaduan->judul;

        $mailMessage = (new MailMessage)
            ->subject($subject)
            ->greeting('Halo, ' . $this->pengaduan->user->name . '!')
            ->line('Ada update terbaru untuk pengaduan Anda dengan judul: "' . $this->pengaduan->judul . '".')
            ->line('Status pengaduan Anda sekarang adalah: **' . $this->statusBaru . '**');

        if ($this->komentar) {
            $mailMessage->line('Komentar dari admin: ' . $this->komentar);
        }

        $mailMessage->action('Lihat Detail Pengaduan', url('/pengaduan/' . $this->pengaduan->id))
            ->line('Terima kasih telah menggunakan layanan kami!');

        return $mailMessage;
    }

    /**
     * Dapatkan representasi array dari notifikasi.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
