<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\View\View;
use App\Models\ItemCategory;
use Illuminate\Http\Request;
use App\Services\SparklineService;

class ItemController extends Controller
{
    public function __construct(private SparklineService $sparklineService) {}

    public function index(ItemCategory $category = null): View
    {
        $categories = ItemCategory::has('items')->orderBy('name')->get();

        $items_query = $category
            ? Item::whereRelation('categories', 'item_category_id', $category->id)
            : Item::query();
    
        $items = $items_query->orderBy('name')->with('history')->paginate(25);
    
        foreach ($items as $item) {
            $item->sparkline = $this->sparklineService->generateSparkline($item->history->pluck('value')->toArray());
        }
    
        return view('pages.items.index', [
            'categories' => $categories,
            'items' => $items,
        ]);
    }

    public function show(Item $item): View
    {
        $item->load('history');

        $dates = $item->history->pluck('created_at')->map(function ($createdAt) {
            return $createdAt->toFormattedDateString();
        })->toArray();

        $values = $item->history->pluck('value')->toArray();

        return view('pages.items.show', [
            'item' => $item,
            'dates' => $dates,
            'values' => $values
        ]);
    }

    public function search(Request $request): View
    {
        $categories = ItemCategory::has('items')->orderBy('name')->get();
        $items = Item::where('name', 'like', '%' . $request->get('search_term') . '%')->paginate(25);

        foreach ($items as $item) {
            $item->sparkline = $this->sparklineService->generateSparkline($item->history->pluck('value')->toArray());
        }

        return view('pages.items.index', [
            'categories' => $categories,
            'items' => $items,
        ]);
    }
}
