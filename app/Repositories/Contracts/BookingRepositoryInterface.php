<?php

namespace App\Repositories\Contracts;

interface BookingRepositoryInterface
{
    public function createBooking(array $data);
    public function findByTrxIdAndPhoneNumber($bookingTrxId, $phoneNumber);
}
