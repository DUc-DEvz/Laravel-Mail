@extends('layouts.app')

@section('content')
    <div class="container  mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Due At</th>
                    <th>Paid At</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoices as $invoice)
                    <tr>
                        <td>{{ $invoice->id }}</td>
                        <td>{{ $invoice->user_id }}</td>
                        <td>{{ $invoice->amount }}</td>
                        <td>{{ $invoice->status }}</td>
                        <td>{{ date('d/m/Y', strtotime($invoice->due_at)) }}</td>
                        <td>{{ date('d/m/Y', strtotime($invoice->paid_at)) }}</td>
                        <td>
                            <a href="{{ route('send-invoice-notification', ['userId' => $invoice->user_id, 'invoiceId' => $invoice->id]) }}"
                                class="btn btn-primary">
                                Gửi Thông Báo Hóa Đơn
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
