<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\FrontService;

class FrontController extends Controller
{
    protected $frontService;

    public function __construct(FrontService $frontService)
    {
        $this->frontService = $frontService;
    }

    public function index()
    {
        $data = $this->frontService->getFrontPageData();
        dd($data);
        // return view('front.index', $data);
    }

    public function details(Ticket $ticket)
    {
        dd($ticket);
        // return view('front.details', compact('ticket'));
    }

    public function category(Category $category)
    {
        dd($category);
        // return view('front.category', compact('category'));
    }

    // public function index()
    // {
    //     $categories = Category::latest()->get();
    //     $popular_tickets = Ticket::where('is_popular', true)->take(4)->get();
    //     $new_tickets = Ticket::latest()->get();
    //     return view('front.index', compact('categories', 'popular_tickets', 'new_tickets'));
    // }
}
