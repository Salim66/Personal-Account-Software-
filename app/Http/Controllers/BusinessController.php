<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;

class BusinessController extends Controller
{

    /**
     * Add Business Name Page
     */
    public function addBusinessNamePage(){
        return view('business.index');
    }

    /**
     * Store business name
     */
    public function businessStore(Request $request){
        $this->validate($request, [
            'name' => 'required'
        ]);

        Business::create([
            'name' => $request->name
        ]);

        $notification = [
            'message' => 'Business name added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    /**
     * Business edit page
     */
    public function businessEdit($id){
        $data = Business::findOrFail($id);
        return view('business.edit', compact('data'));
    }

    /**
     * Update business name
     */
    public function businessUpdate(Request $request, $id){

        Business::where('id', $id)->update([
            'name' => $request->name
        ]);

        $notification = [
            'message' => 'Business name updated successfully',
            'alert-type' => 'info',
        ];

        return redirect()->route('add.business.name')->with($notification);
    }

    /**
     * Delete business name
     */
    public function businessDelete($id){
        Business::where('id', $id)->delete();
        $notification = [
            'message' => 'Business name deleted successfully',
            'alert-type' => 'error',
        ];

        return redirect()->back()->with($notification);
    }
}
