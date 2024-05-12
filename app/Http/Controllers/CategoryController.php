<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function categoriesPage(){

        $categories = Category::where("user_id", Auth::id())->get();

        return view("front.categories", compact("categories"));
    }

    public function createCategoryPage()
    {
        return view("front.createCategory");
    }

    public function createCategory(Request $request){

        request()->validate([
           "name"=>"required | min:3 | max:20",
           "is_active" => "required"
        ],
        [
            "name.required"=>"Kategori adı boş bırakılamaz!",
            "name.min" => "Kategori adı minimum 3 karakter olabilir!",
            "name.max" => "Kategori adı maksimum 20 karakter olabilir!",
            "is_active" => "Durum boş bırakılamaz!"
        ]);

        $category = new Category();
        $category->user_id = Auth::user()->id;
        $category->name = $request->name;
        $category->is_active = $request->is_active;
        $category->save();

        return redirect()->route("categoriesPage")->with("success", "Kategori başarıyla oluşturuldu.");
    }

    public function updateCategoryPage($id)
    {
        $category = Category::find($id);

        if($category->user_id != Auth::id()){
            abort(403);
        }

        return view("front.updateCategory", compact("id", "category"));
    }

    public function updateCategory(Request $request, $id){

        request()->validate([
            "name"=>"required | min:3 | max:20",
            "is_active" => "required"
        ],[
            "name.required"=>"Kategori adı boş bırakılamaz!",
            "name.min" => "Kategori adı minimum 3 karakter olabilir!",
            "name.max" => "Kategori adı maksimum 20 karakter olabilir!",
            "is_active" => "Durum boş bırakılamaz!"
        ]);

        $category = Category::find($id);

        if($category->user_id != Auth::id()){
            abort(403);
        }

        $category->name = $request->name;
        $category->is_active = $request->is_active;
        $category->save();

        return redirect()->route("categoriesPage")->with("success", "Kategori başarıyla güncellendi.");
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);

        if($category->user_id != Auth::id()){
            abort(403);
        }

        $category->delete();

        return redirect()->route("categoriesPage")->with("success", "Kategori başarıyla silindi.");
    }
}
