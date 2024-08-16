<?php

namespace App\Filament\Resources\BookingTransactionResource\Widgets;

use App\Models\BookingTransaction;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class BookingTransactionStats extends BaseWidget
{
    protected function getStats(): array
    {
        $totalTransactions = BookingTransaction::count();
        $approvedTransactions = BookingTransaction::where('is_paid', true)->count();
        $totalRevenue = BookingTransaction::where('is_paid', true)->sum('total_amount');

        return [
            Stat::make('Total Transactions', $totalTransactions)
            ->description('All Transactions')
            ->descriptionIcon('heroicon-o-currency-dollar'),
            Stat::make('Approved Transactions', $approvedTransactions)
            ->description('Approved Transactions')
            ->descriptionIcon('heroicon-o-check-circle')
            ->color('success'),
            Stat::make('Total Revenue', 'IDR' . number_format($totalRevenue))
            ->description('Revenue from approved transactions')
            ->descriptionIcon('heroicon-o-check-circle')
            ->color('success'),
        ];
    }
}
