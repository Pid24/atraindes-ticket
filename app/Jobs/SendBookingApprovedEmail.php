<?php

namespace App\Jobs;

use App\Mail\OrderApproved;
use App\Models\BookingTransaction;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendBookingApprovedEmail implements ShouldQueue
{
    use Queueable;

    protected $booking;

    /**
     * Create a new job instance.
     */
    public function __construct(BookingTransaction $bookingTransaction)
    {
        $this->booking = $bookingTransaction;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->booking->email)->send(new OrderApproved($this->booking));
    }
}
