<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Controllers\Controller;
class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $category = Category::all();
    	return view('admin/categories.index',
            ['categories'=>$category]);
    }

   public function add()
    {
        return view('admin/categories.add');
    }

    public function create()
    {
        $category = new Category();
        $category->name = request()->name;
        $category->remark = request()->remark;
        $category->save();
        return redirect('admin/categories');
    }

    public function delete($id){
        $category = Category::find($id);
        $category->delete();

        return redirect('admin/categories');
    }

    public function edit($id){
        $category = Category::find($id);
        return view('admin/categories.edit',
            ['category'=> $category ]);
   }

   public function update($id){
        $category = Category::find($id);
        $category->name = request()->name;
        $category->remark = request()->remark;
        $category->save();

        return redirect('admin/categories');

   }

}
