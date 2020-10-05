<?php

namespace App\Http\Controllers;

use App\Order;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;

        $this->middleware('auth');
    }

    /**
     * Display a listing of the Orders of User.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('customer_id', $user->id)
            ->orderBy('id', 'desc')
            ->get();

        return view('orders.index')->with('orders', $orders);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart = $this->cartService->getCartFromUser();

        if (!isset($cart) || $cart->products->isEmpty()) {
            return redirect()
                ->back()
                ->withErrors("Your cart is empty");
        } else {

            $user = $request->user();

            $order = $user->orders()->create([
                'status' => 'pending',
            ]);

            $cart = $this->cartService->getCartFromUser();

            $cartProductsWithQuantity = $cart
                ->products
                ->mapWithKeys(function ($product) {
                    $element[$product->id] = ['quantity' => $product->pivot->quantity];

                    return $element;
                });

            $order->products()->attach($cartProductsWithQuantity->toArray());

            return redirect()->route('orders.payments.create', ['order' => $order]);
        }
    }
}
