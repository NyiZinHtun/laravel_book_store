<?php

namespace App\Http\Controllers ;

use Illuminate\Http\Request;
use App\Book;
use App\Order;
use App\Category;
use App\Order_items;
use Session;
class BookController extends Controller
{
   public function index(){
      $books = Book::all();
   	return view('books.index',['books'=>$books]);
   }

   public function add_to_cart(Request $request,$id){
      $book = Book::find($id);
      $cart = session()->get('cart');
      if(!$cart){
         $cart = [
               $id=>[
                  'name'=>$book->title,
                  'qty'=>1,
                  'price'=>$book->price
               ]
               ];
               session()->put('cart',$cart);
               return redirect('/');
      }

      if(isset($cart[$id])){
         $cart[$id]['qty']++;         
         session()->put('cart',$cart);
         return redirect('/');
      }

      $cart[$id]=[
         'name'=>$book->title,
         'qty'=>1,
         'price'=>$book->price
      ];
      session()->put('cart',$cart);
      return redirect('/');

      // if(!isset($_SESSION['total'])) {
      //    $_SESSION['total'] = array(0=>0);
      // }
      // if(isset($_SESSION['total'][$id]))
      // {
      //    $_SESSION['total'][$id]++;
      //  }else {
      //    $_SESSION['total'][$id] = $_SESSION['total']['0'];
      //    $_SESSION['total'][$id] = 1;
      //  }      
   }

   public function clear_cart(){
      session()->forget('cart');
      return redirect('/');
   }

   public function view(){
      $books =Book::all();
     if(session('cart')){
      return view('books.view',['books'=>$books]);
     }else{
      return redirect('/')->with('message','You Need To Order');
    }
   }
}
