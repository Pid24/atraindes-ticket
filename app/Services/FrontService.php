<?php

namespace App\Services;

use App\Repositories\Contracts\SellerRepositoryInterface;
use App\Repositories\Contracts\TicketRepositoryInterface;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class FrontService
{
    protected $categoryRepository;
    protected $ticketRepository;
    protected $sellerRepository;

    public function __construct(TicketRepositoryInterface $ticketRepository,
    CategoryRepositoryInterface $categoryRepository, SellerRepositoryInterface $sellerRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->ticketRepository = $ticketRepository;
        $this->sellerRepository = $sellerRepository;
    }

    public function getFrontpageData()
    {
        $categories = $this->categoryRepository->getAllCategories();
        $sellers = $this->sellerRepository->getAllSellers();
        $popularTickets = $this->ticketRepository->getPopularTickets(4);
        $newTickets = $this->ticketRepository->getAllNewTickets();

        return compact('categories', 'sellers', 'popularTickets', 'newTickets');
    }
}
