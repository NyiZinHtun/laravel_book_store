<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Book;
use App\Order_items;
use validate;
use session;

class OrderController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $orders = Order::all();
        return view('orders.index',compact('orders'));
    }

    public function create()
    {
        $orders = Order::all();
        return view('orders.create',compact('orders'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email|unique:orders',
            'phone' => 'required|min:11|numeric',
            'address' => 'required'
        ],
        [
            'name.required' => 'name required!',
            'email.required' => 'email required!',
            'phone.required' => 'phone required!',
            'address.required' => 'address required!'
        ]);
        // $order = new Order();
        // $order->name = request()->name;
        // $order->email = request()->email;
        // $order->phone = request()->phone;
        // $order->address = request()->address;
        // $order->save();
        Order::create(request(['name','email','phone','address']));    
        $cart = session()->get('cart');
        foreach($cart as $id=>$cart) {
            $order_items = new Order_items();
            $order_items->book_id =$id;
            $order_items->order_id = $id;         
            $order_items->qty = $cart['qty'];           
            $order_items->save();
        }
        session()->forget('cart');
        return redirect('/');
    }

    public function show()
    {
        $orders = Order::all();
        $books = Book::all();
        return view('orders.show',['orders'=>$orders],['books'=>$books]);
    }

    public function edit(Order $order)    {
        
        return view('orders.edit',compact('order'));
    }

    public function update(Order $order)
    {
        //$order = Order::findOrFail($id);
        $order->update(request(['name','email','phone','address']));
        return redirect('/orders');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect('/orders');
    }
}
