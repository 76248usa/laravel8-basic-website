<?php

namespace App\Http\Controllers;

use App\Models\HomeAbout;
use Illuminate\Http\Request;

class HomeAboutController extends Controller
{
    public function HomeAbout(){
        $homeabout = HomeAbout::latest()->get();
        return view('admin.about.index', compact('homeabout'));
    }

    public function StoreAbout(Request $request){
        $validatedRequest = $request->validate([
            'title' => 'required' ,
            'long_desc' => 'required',
            'short_desc' => 'required',
            'first_li' => 'required',
            'second_li' => 'required'
        ]);
    
    HomeAbout::insert([
        'title' =>  $request->title,
        'long_desc' => $request->long_desc,
        'short_desc' => $request->short_desc,
        'first_li' => $request->first_li,
        'second_li' => $request->second_li,
    ]);

    return Redirect()->back()->with('success', 'About data entered successfully');

    }

    public function EditAbout($id){
        $about = HomeAbout::findOrFail($id);
        return view('admin.about.edit', compact('about'));

    }
    public function UpdateAbout(Request $request, $id){
        $validateRequest = $request->validate([
            'title' => 'required',
            'short_desc' => 'required',
            'first_li' => 'required',
            'second_li' => 'required'
        ]);

        HomeAbout::findOrFail($id)->update([
            'title' => $request->title,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'first_li' => $request->first_li,
            'second_li' => $request->second_li,

        ]);

        return Redirect()->back()->with('success','Updated successfully');
    }

    public function DeleteAbout($id){
        HomeAbout::findOrFail($id)->delete();
        
        return Redirect()->back()->with('success','Removed successfully');
    }

    
}
