<x-mail::message>
    Hi {{ $booking->name }}, pesanan anda dengan kode booking {{ $booking->booking_trx_id }} telah berhasil!, Silahkan
    datang kepada loket terdekat untuk melakukan penukaran tiket dengan yang asli!

    <x-mail::button :url="route('front.check_booking')">
        Contact CS
    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
