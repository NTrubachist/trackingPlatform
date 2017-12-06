<?php

namespace App\Http\Controllers;

use App\Client;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $client = Client::findOrFail($request->client);
        return view('orders.create', compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = Client::findOrFail($request->client);
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'describe' => 'required|string|max:255',
            'price' => 'required|integer|min:0'
        ]);
        $order = new Order();
        $inputs = $request->except(['_token', 'client']);
        foreach ($inputs as $key=>$input)
        {
            $order->{$key} = $input;
        }
        $order->client()->associate($client);
        $order->save();
        return redirect()->route('clients.edit', compact('client'))->with(['message' => 'Pasūtījums izveidots veiksmīgi!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order, Client $client)
    {
        return view('orders.edit', compact('order', 'client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {

        $this->validate($request,[
            'name' => 'required|string|max:255',
            'describe' => 'required|string|max:255',
            'price' => 'required|integer|min:0'
        ]);
        $inputs = $request->except(['_token', '_method', 'client']);
        foreach ($inputs as $key=>$input)
        {
            $order->{$key} = $input;
        }

        $order->client_id = $client = $order->client->id;
        $order->save();

        return redirect()->route('clients.edit', compact('client'))->with(['message' => 'Pasūtījums rediģēts veiksmīgi!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        $client = $order->client->id;
        return redirect()->route('clients.edit', compact('client'))->with(['message' => 'Pasūtījums veiksmīgi izdzēsts!']);
    }
}
