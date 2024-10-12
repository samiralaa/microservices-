<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    public function index()
    {
        return response()->json(Order::all());
    }

    public function store(Request $request)
    {

        // Check if user exists
        $response = Http::get(env('USER_SERVICE_URL') . '/api/users/' . $request->user_id);

        if ($response->status() != 200) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $order = Order::create($request->all());
        return response()->json($order, 201);
    }
}
