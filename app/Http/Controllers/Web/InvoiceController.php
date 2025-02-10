<?php

namespace App\Http\Controllers\Web;

use App\Notifications\InvoicePaid;
use App\Models\User;
use App\Models\Invoice;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();
        $unreadCount = auth()->user()->notifications->count();
        return view('invoice', compact('invoices', 'unreadCount'));
    }

    public function sendInvoiceNotification($userId, $invoiceId)
    {
        $user = User::find($userId);
        $invoice = Invoice::find($invoiceId);

        if (!$user || !$invoice) {
            return redirect()->back()->with('error', 'Không tìm thấy User hoặc Invoice!');
        }

        $user->notify(new InvoicePaid($invoice));

        return back()->with('success', 'Thông báo đã được gửi thành công!');
    }
}
