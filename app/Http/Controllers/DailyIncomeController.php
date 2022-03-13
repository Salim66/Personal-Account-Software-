<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Person;
use App\Models\DailyIncome;
use Illuminate\Http\Request;

class DailyIncomeController extends Controller
{
    /**
     * Add Daily Expense Page
     */
    public function addDailyIncomePage( Request $request ){

        if( request() -> ajax() ){


            // when two date is empty and  business id has this purson is run
            if( !empty( $request->business_id ) && $request->from_date == "Invalid date" ){

                return datatables()->of( DailyIncome::with( 'business' )->where('business_id', $request->business_id)->latest()->get() )->addColumn( 'action', function ( $data ) {
                    $output = '<a title="Edit" edit_id="' . $data['id'] . '" href="#" class="btn btn-sm btn-outline-info edit_daily_income_data" style="margin-right: 10px;"><i class="fa fa-edit text-white"></i></a>';

                    $output .= '<form style="display: inline;" action="#" method="POST" delete_id = "'.$data['id'].'" class="daily_income_delete_form"><input type="hidden" name="id" class="delete_in" value="' .
                    $data['id'] . '"><button type="submit" class="btn btn-sm ml-1 btn-outline-danger" ><i class="fa fa-trash"></i></button></form>';
                    return $output;
                } )->rawColumns( ['action'] )->make( true );

            }

            // when two date has and  business id is empty this purson is run
             if ( !empty( $request->from_date ) && !empty( $request->to_date && empty( $request->business_id ) ) ) {

                return datatables()->of( DailyIncome::with( 'business' )->whereBetween('created_at', [$request->from_date, $request->to_date])->latest()->get() )->addColumn( 'action', function ( $data ) {
                    $output = '<a title="Edit" edit_id="' . $data['id'] . '" href="#" class="btn btn-sm btn-outline-info edit_daily_income_data" style="margin-right: 10px;"><i class="fa fa-edit text-white"></i></a>';

                    $output .= '<form style="display: inline;" action="#" method="POST" delete_id = "'.$data['id'].'" class="daily_income_delete_form"><input type="hidden" name="id" class="delete_in" value="' .
                    $data['id'] . '"><button type="submit" class="btn btn-sm ml-1 btn-outline-danger" ><i class="fa fa-trash"></i></button></form>';
                    return $output;
                } )->rawColumns( ['action'] )->make( true );

            }

            // when all data has
            if( !empty( $request->from_date ) && !empty( $request->to_date ) && !empty( $request->business_id ) ){

                return datatables()->of( DailyIncome::with( 'business' )->whereBetween('created_at', [$request->from_date, $request->to_date])->where('business_id', $request->business_id)->latest()->get() )->addColumn( 'action', function ( $data ) {
                        $output = '<a title="Edit" edit_id="' . $data['id'] . '" href="#" class="btn btn-sm btn-outline-info edit_daily_income_data" style="margin-right: 10px;"><i class="fa fa-edit text-white"></i></a>';

                        $output .= '<form style="display: inline;" action="#" method="POST" delete_id = "'.$data['id'].'" class="daily_income_delete_form"><input type="hidden" name="id" class="delete_in" value="' .
                        $data['id'] . '"><button type="submit" class="btn btn-sm ml-1 btn-outline-danger" ><i class="fa fa-trash"></i></button></form>';
                        return $output;
                } )->rawColumns( ['action'] )->make( true );

            }

            // When all fields are empty this purson is run
            if( empty( $request->business_id ) && empty( $request->from_date ) && empty( $request->to_date )){

                return datatables()->of( DailyIncome::with( 'business' )->latest()->get() )->addColumn( 'action', function ( $data ) {
                    $output = '<a title="Edit" edit_id="' . $data['id'] . '" href="#" class="btn btn-sm btn-outline-info edit_daily_income_data" style="margin-right: 10px;"><i class="fa fa-edit text-white"></i></a>';

                    $output .= '<form style="display: inline;" action="#" method="POST" delete_id = "'.$data['id'].'" class="daily_income_delete_form"><input type="hidden" name="id" class="delete_in" value="' .
                    $data['id'] . '"><button type="submit" class="btn btn-sm ml-1 btn-outline-danger" ><i class="fa fa-trash"></i></button></form>';
                    return $output;
                } )->rawColumns( ['action'] )->make( true );

            }


        }


        return view('daily-income.index');
    }

    /**
     * Store Daily Income name
     */
    public function incomeStore(Request $request){
        $this->validate($request, [
            'business_id' => 'required',
            'amount' => 'required',
            'remark' => 'required',
            'date' => 'required',
        ]);

        DailyIncome::create([
            'business_id' => $request->business_id,
            'person_id' => $request->person_id,
            'amount' => $request->amount,
            'remark' => $request->remark,
            'date' => $request->date,
        ]);

        $notification = [
            'message' => 'Data added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    /**
     * Daliy Income edit page
     */
    public function incomeEdit($id){
        $data = DailyIncome::findOrFail($id);


        // //All investment Business
        $businesses = Business::latest()->get();
        //Selected business id
        $selected_business_id = $data->business->id;


        $business_list = '';
        foreach ( $businesses as $business ) {
            if ( $business->id === $selected_business_id ) {
                $selected = 'selected';
            } else {
                $selected = '';
            }

            $business_list .= '<option value="' . $business->id . '" ' . $selected . '>' . $business->name . '</option>';

        }

        // //All investment Person
        $personses = Person::latest()->get();
        //Selected person id
        $selected_person_id = $data->person_id;

        // $selected_person_id = $data->person->id;


        $person_list = '<option disabled selected>-Select-</option>';
        foreach ( $personses as $person ) {
            if ( $person->id === $selected_person_id ) {
                $selected = 'selected';
            } else {
                $selected = '';
            }

            $person_list .= '<option value="' . $person->id . '" ' . $selected . '>' . $person->person_name . '</option>';

        }


        // return $person_list;
        return [
            'id'     => $data->id,
            'business'  => $business_list,
            'person'  => $person_list,
            'amount' => $data->amount,
            'remark' => $data->remark,
        ];

    }

    /**
     * Update Daily Income
     */
    public function incomeUpdate(Request $request){

        DailyIncome::where('id', $request->id)->update([
            'business_id' => $request->business_id,
            'person_id' => $request->person_id,
            'amount' => $request->amount,
            'remark' => $request->remark,
        ]);

        $notification = [
            'message' => 'Data updated successfully',
            'alert-type' => 'info',
        ];

        return redirect()->back()->with($notification);
    }

    /**
     * Delete daily income
     */
    public function incomeDelete(Request $request){
        DailyIncome::where('id', $request->id)->delete();
        $notification = [
            'message' => 'Data deleted successfully',
            'alert-type' => 'error',
        ];

        return redirect()->back()->with($notification);
    }
}
