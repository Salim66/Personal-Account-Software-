<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Add Person Name Page
     */
    public function addPersonNamePage(){
        return view('person.index');
    }

    /**
     * Store person name
     */
    public function personStore(Request $request){
        $this->validate($request, [
            'business_id' => 'required',
            'person_name' => 'required'
        ]);

        Person::create([
            'business_id' => $request->business_id,
            'person_name' => $request->person_name
        ]);

        $notification = [
            'message' => 'Person name added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    /**
     * Person edit page
     */
    public function personEdit($id){
        $data = Person::findOrFail($id);
        return view('person.edit', compact('data'));
    }

    /**
     * Update person name
     */
    public function personUpdate(Request $request, $id){

        Person::where('id', $id)->update([
            'business_id' => $request->business_id,
            'person_name' => $request->person_name
        ]);

        $notification = [
            'message' => 'Person name updated successfully',
            'alert-type' => 'info',
        ];

        return redirect()->route('add.person.name')->with($notification);
    }

    /**
     * Delete person name
     */
    public function personDelete($id){
        Person::where('id', $id)->delete();
        $notification = [
            'message' => 'Person name deleted successfully',
            'alert-type' => 'error',
        ];

        return redirect()->back()->with($notification);
    }
}
