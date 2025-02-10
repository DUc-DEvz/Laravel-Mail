<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class InvoicePaid extends Notification
{
    use Queueable;

    protected $invoice;

    /**
     * Tạo instance của Notification.
     */
    public function __construct($invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * Xác định kênh gửi thông báo (email, database, ...)
     */
    public function via($notifiable)
    {
        return ['mail', 'database']; // Gửi qua email và lưu vào database
    }

    /**
     * Nội dung gửi qua email.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Hóa đơn đã được thanh toán')
            ->greeting('Xin chào ' . $notifiable->name . ',')
            ->line('Hóa đơn #' . $this->invoice->id . ' đã được thanh toán thành công.')
            ->action('Xem chi tiết', url('/invoices/' . $this->invoice->id))
            ->line('Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi!');
    }

    /**
     * Lưu thông báo vào database.
     */
    public function toArray($notifiable)
    {
        return [
            'invoice_id' => $this->invoice->id,
            'amount' => $this->invoice->amount,
            'message' => 'Hóa đơn #' . $this->invoice->id . ' đã được thanh toán.',
        ];
    }
}
