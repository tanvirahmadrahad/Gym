<?php

namespace App\Http\Controllers;

use App\Models\StoreOrder;
use App\Models\StoreProduct;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StoreController extends Controller
{
    /**
     * Display Gym Store Catalog.
     */
    public function index(Request $request): View
    {
        $category = $request->query('category', 'All');
        $search = $request->query('q');

        $query = StoreProduct::query()->where('in_stock', true);

        if ($category && $category !== 'All') {
            $query->where('category', $category);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $products = $query->orderBy('rating', 'desc')->get();
        $categories = ['All', 'Supplements', 'Gear', 'Apparel'];

        return view('store.index', compact('products', 'categories', 'category', 'search'));
    }

    /**
     * Process member store order checkout (bKash, Nagad, Card, Counter).
     */
    public function checkout(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'items' => ['required'],
            'total_amount' => ['required', 'numeric', 'min:1'],
            'payment_method' => ['required', 'string'],
            'trx_id' => ['nullable', 'string'],
        ]);

        $items = is_string($validated['items']) ? json_decode($validated['items'], true) : $validated['items'];
        $user = $request->user();

        $orderCode = 'FIT-ORD-'.strtoupper(substr(uniqid(), -6));
        $trxId = $validated['trx_id'] ?? strtoupper(substr($validated['payment_method'], 0, 3)).'-'.rand(100000, 999999);

        $order = StoreOrder::create([
            'user_id' => $user->id,
            'order_code' => $orderCode,
            'total_amount' => $validated['total_amount'],
            'payment_method' => $validated['payment_method'],
            'trx_id' => $trxId,
            'items_json' => $items,
            'status' => 'PAID & READY FOR PICKUP',
            'shipping_address' => 'Pick up at Gym Front Reception Desk (Locker Delivery Available)',
        ]);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Store order confirmed successfully!',
                'order_code' => $orderCode,
                'trx_id' => $trxId,
                'order' => $order,
            ]);
        }

        return redirect()->route('store.index')->with('success', "Order {$orderCode} confirmed! Your gear is ready for pickup at reception. Transaction ID: {$trxId}");
    }
}
