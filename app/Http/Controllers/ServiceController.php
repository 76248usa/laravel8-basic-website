<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Carbon;


class ServiceController extends Controller
{
    public function HomeServices(){
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    public function StoreServices(Request $request){
        $validatedRequest = $request->validate([
            'main_title' => 'required',
            'title' => 'required',
            'desc' => 'required',
            'icon' => 'required',
            'created_at' => Carbon::now()
        ]);

        Service::insert([
            'main_title' => $request->main_title,
            'title' => $request->title,
            'desc' => $request->desc,
            'icon' => $request->icon,
            'created_at' => Carbon::now()

        ]);

        return Redirect()->back()->with('success', 'Inserted successfully');
    }
    public function EditService($id){
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    public function UpdateService(Request $request, $id){
        $service = Service::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'icon' => 'required',
            'desc' => 'required',

        ]);

        $service->update([
            'main_title' => $request->main_title,
            'title' => $request->title,
            'icon' => $request->icon,
            'desc' => $request->desc,
            'updated_at' => Carbon::now()
        ]);
        return Redirect()->back()->with('success','Service updated successfully');
    }

    public function DeleteService($id){
        Service::findOrFail($id)->delete();
        return Redirect()->back()->with('success', 'Deleted successfully');
    }
}
