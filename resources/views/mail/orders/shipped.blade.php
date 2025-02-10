<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng đã được gửi đi</title>
</head>

<body>
    <h2>Xin chào {{ $order->customer_name }},</h2>

    <p>Chúng tôi xin thông báo rằng đơn hàng của bạn đã được gửi đi thành công.</p>

    <h3>Thông tin đơn hàng:</h3>
    <ul>
        <li><strong>Mã đơn hàng:</strong> {{ $order->id }}</li>
        <li><strong>Ngày đặt hàng:</strong> {{ $order->created_at->format('d/m/Y') }}</li>
        <li><strong>Địa chỉ giao hàng:</strong> {{ $order->shipping_address }}</li>
        <li><strong>Tổng tiền:</strong> {{ number_format($order->total_price, 0, ',', '.') }} VNĐ</li>
    </ul>

    <p>Cảm ơn bạn đã tin tưởng và sử dụng dịch vụ của chúng tôi!</p>

    <p>Trân trọng,<br>Đội ngũ hỗ trợ</p>
</body>

</html>
