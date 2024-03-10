<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function HomeSlider(){
        $sliders = Slider::latest()->get();
        return view('admin.slider.index', compact('sliders'));
    }

    public function AddSlider(){
        return view('admin.slider.create');
    }
    public function StoreSlider(Request $request){
        // $requestValidated = $request->validate([
        //     'title' => 'required',
        //     'image' => 'required'
        // ]);
        $slider_image = $request->file('image');
        
        $name_gen = hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
        Image::make($slider_image)->resize(1920,1088)->save('image/slider/'.$name_gen);
        
        $last_img = 'image/slider/'.$name_gen;

        Slider::insert([
            'title' => $request->title,
            'image' => $last_img,
            'description' => $request->description,
            'created_at' => Carbon::now()

        ]);
        return Redirect()->route('home.slider')->with('success', 'Slider picture added');
    }

    public function EditSlider($id){
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
    }

    // public function UpdateSlider(Request $request, $id){
    //     $image = $request->file('image');

    //     $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    //     Image::make($image)->resize(1920,1088)->save('image/slider'.$name_gen);

    //     $last_img = 'image/slider'.$name_gen;

    //     Slider::insert([
    //         'title' => $request->title,
    //         'image' => $last_img,
    //         'description' => $request->description,
    //         'updated_at' => Carbon::now()

    //     ]);
    //     return Redirect()->route('home.slider')->with('success', 'Slider updated');


    // }

    public function UpdateSlider(Request $request, $id){

        // $validatedData = $request->validate([
        //     'title' => 'required|min:4',
                       
        // ],
        // [
        //     'title.required' => 'Please Input Brand Name',
        //     'image.min' => 'Brand Longer then 4 Characters', 
        // ]);

        $old_image = $request->old_image;

        $image =  $request->file('image');

        if($image){
        
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'image/slider/';
        $last_img = $up_location.$img_name;
        $image->move($up_location,$img_name);

        if($old_image){
         unlink($old_image);
      }
        //unlink($old_image);
        
        Slider::find($id)->update([
            'title' => $request->title,
            'image' => $last_img,
            'updated_at' => Carbon::now()
        ]);

        return Redirect()->back()->with('success', 'Updated Successfully');
      } else {

          Slider::find($id)->update([
            'title' => $request->title,
            'updated_at' => Carbon::now()
        ]);

        return Redirect()->back()->with('success', 'Updated Successfully');

      }      
    }

    public function Delete($id){
      $image = Slider::find($id);
      $old_image = $image->image;

      if($old_image){
         unlink($old_image);
      }
      
      Slider::findOrFail($id)->delete();
      return Redirect()->back()->with('success', 'Deleted Successfully');

    }
}
