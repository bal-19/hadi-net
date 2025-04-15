<h2>Pesanan Selesai</h2>
<p>Halo {{ $order->user->name }},</p>
<p>Pesanan anda dengan nomor <strong>{{ $order->code }}</strong> telah selesai.</p>
<p>Status Pesanan: {{ $order->order_status }}</p>
<p>Terima kasih telah menggunakan layanan kami.</p>
