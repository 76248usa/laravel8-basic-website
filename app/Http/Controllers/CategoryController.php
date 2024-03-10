<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function AllCat(){
        // $categories = DB::table('categories')
        // ->join('users','categories.user_id', 'users.id')
        // ->select('categories.*', 'users.name')
        // ->latest()->paginate(5);
        $categories = Category::latest()->paginate(5);
        $trashCat = Category::latest()->onlyTrashed()->paginate(3);
       //$categories = DB::table('categories')->latest()->paginate(5);
        return view('admin.category.index', compact('categories', 'trashCat'));
    }

    // public function AddCat(Request $request){
    //     $validateData = $request->validate([
    //         'category_name' => 'required | unique:categories | max:255',
    //     ],
    // );
    
    //     Category::insert([
    //         'category_name' => $request->category_name,
    //         'user_id' => Auth::user()->id,
    //         'created_at' => Carbon::now()
    //     ]);
        
    // }


    public function AddCat(Request $request){
        $validatedData = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
            
        ],
        [
            'category_name.required' => 'Please Input Category Name',
            'category_name.max' => 'Category Less Then 255Chars', 
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);

        // $category = new Category;
        // $category->category_name = $request->category_name;
        // $category->user_id = Auth::user()->id;
        // $category->save();

        // $data = array();
        // $data['category_name'] = $request->category_name;
        // $data['user_id'] = Auth::user()->id;
        // DB::table('categories')->insert($data);

        return Redirect()->back()->with('success','Category inserted');
}

public function Edit($id){
    $category = Category::findOrFail($id);
    return view('admin.category.edit', compact('category'));
}

public function Update($id, Request $request){
    $category = Category::findOrFail($id)->update([
        'category_name' => $request->category_name,
        'user_id' => Auth::user()->id
    ]);

   return Redirect()->route('all.category')->with('success','Category Updated');
    
}

public function SoftDelete($id){
    $delete = Category::findOrFail($id)->delete();
    return Redirect()->back()->with('success','Category deleted to trash folder');
}
public function Restore($id){
    $category = Category::withTrashed()->findOrFail($id)->restore();
    return Redirect()->back()->with('success', 'Restored successfully');
}
}
