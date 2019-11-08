<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Book;
use App\Category;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
    	$books = Book::all();
    	return view('admin/books.index',['books'=>$books]);
    }

    public function add(){
    	$categories = Category::all();
    	return view('admin/books.add',['categories'=>$categories]);
    }

    public function create(Request $request){
    	$book = new Book();
    	$book->title = request()->title;
    	$book->author = request()->author;
    	$book->summary = request()->summary;
    	$book->price = request()->price;
    	$book->category_id = request()->category_id; 
        
        $imageName = time().'.'.request()->file('cover')->getClientOriginalExtension();
        request()->file('cover')->move(public_path('storage/images'), $imageName);
        $book->cover = $imageName;
        $book->save();

    	return redirect('admin/books');
    }

    public function delete($id){
        $book = Book::find($id);
        $book->delete();

        return redirect('admin/books');
    }

    public function edit($id){
        $book = Book::find($id);
        $categories = Category::all();
        return view('admin/books.edit',['book'=>$book],['categories'=>$categories]);
    }

    public function update($id,Request $request){
        $book = Book::find($id);
        $book->title = request()->title;
        $book->author = request()->author;
        $book->summary = request()->summary;
        $book->price = request()->price;
        $book->category_id = request()->category_id;

        if($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $filename = $cover->getClientOriginalName();
            $cover->move(public_path('/storage/images'), $filename);
            $book->cover = $request->file('cover')->getClientOriginalName();
        }
        $book->save();

        return redirect('admin/books');
    }
}
