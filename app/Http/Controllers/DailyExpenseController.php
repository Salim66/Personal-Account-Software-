<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\DailyExpense;
use Illuminate\Http\Request;

class DailyExpenseController extends Controller
{
     /**
     * Add Daily Expense Page
     */
    public function addDailyExpensePage( Request $request ){

        if( request() -> ajax() ){

            // when two date has and  business id is empty this purson is run
             if ( !empty( $request->from_date ) && !empty( $request->to_date && empty( $request->business_id ) ) ) {

                return datatables()->of( DailyExpense::with( 'business' )->whereBetween('created_at', [$request->from_date, $request->to_date])->latest()->get() )->addColumn( 'action', function ( $data ) {
                    $output = '<a title="Edit" edit_id="' . $data['id'] . '" href="#" class="btn btn-sm btn-outline-info edit_daily_expense_data" style="margin-right: 10px;"><i class="fa fa-edit text-white"></i></a>';

                    $output .= '<form style="display: inline;" action="#" method="POST" delete_id = "'.$data['id'].'" class="daily_expense_delete_form"><input type="hidden" name="id" class="delete_in" value="' .
                    $data['id'] . '"><button type="submit" class="btn btn-sm ml-1 btn-outline-danger" ><i class="fa fa-trash"></i></button></form>';
                    return $output;
                } )->rawColumns( ['action'] )->make( true );

            }

            // when all data has
            if( !empty( $request->from_date ) && !empty( $request->to_date ) && !empty( $request->business_id ) ){

                return datatables()->of( DailyExpense::with( 'business' )->whereBetween('created_at', [$request->from_date, $request->to_date])->where('business_id', $request->business_id)->latest()->get() )->addColumn( 'action', function ( $data ) {
                        $output = '<a title="Edit" edit_id="' . $data['id'] . '" href="#" class="btn btn-sm btn-outline-info edit_daily_expense_data" style="margin-right: 10px;"><i class="fa fa-edit text-white"></i></a>';

                        $output .= '<form style="display: inline;" action="#" method="POST" delete_id = "'.$data['id'].'" class="daily_expense_delete_form"><input type="hidden" name="id" class="delete_in" value="' .
                        $data['id'] . '"><button type="submit" class="btn btn-sm ml-1 btn-outline-danger" ><i class="fa fa-trash"></i></button></form>';
                        return $output;
                } )->rawColumns( ['action'] )->make( true );

            }

            // when two date is empty and  business id has this purson is run
            if( !empty( $request->business_id ) && empty( $request->from_date ) && empty( $request->to_date )){

                return datatables()->of( DailyExpense::with( 'business' )->where('business_id', $request->business_id)->latest()->get() )->addColumn( 'action', function ( $data ) {
                    $output = '<a title="Edit" edit_id="' . $data['id'] . '" href="#" class="btn btn-sm btn-outline-info edit_daily_expense_data" style="margin-right: 10px;"><i class="fa fa-edit text-white"></i></a>';

                    $output .= '<form style="display: inline;" action="#" method="POST" delete_id = "'.$data['id'].'" class="daily_expense_delete_form"><input type="hidden" name="id" class="delete_in" value="' .
                    $data['id'] . '"><button type="submit" class="btn btn-sm ml-1 btn-outline-danger" ><i class="fa fa-trash"></i></button></form>';
                    return $output;
                } )->rawColumns( ['action'] )->make( true );

            }

            // When all fields are empty this purson is run
            if( empty( $request->business_id ) && empty( $request->from_date ) && empty( $request->to_date )){

                return datatables()->of( DailyExpense::with( 'business' )->latest()->get() )->addColumn( 'action', function ( $data ) {
                    $output = '<a title="Edit" edit_id="' . $data['id'] . '" href="#" class="btn btn-sm btn-outline-info edit_daily_expense_data" style="margin-right: 10px;"><i class="fa fa-edit text-white"></i></a>';

                    $output .= '<form style="display: inline;" action="#" method="POST" delete_id = "'.$data['id'].'" class="daily_expense_delete_form"><input type="hidden" name="id" class="delete_in" value="' .
                    $data['id'] . '"><button type="submit" class="btn btn-sm ml-1 btn-outline-danger" ><i class="fa fa-trash"></i></button></form>';
                    return $output;
                } )->rawColumns( ['action'] )->make( true );

            }


        }


        return view('daily-expense.index');
    }

    /**
     * Store Daily Expense name
     */
    public function expenseStore(Request $request){
        $this->validate($request, [
            'business_id' => 'required',
            'amount' => 'required',
            'remark' => 'required'
        ]);

        DailyExpense::create([
            'business_id' => $request->business_id,
            'amount' => $request->amount,
            'remark' => $request->remark,
        ]);

        $notification = [
            'message' => 'Data added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    /**
     * Daliy Expense edit page
     */
    public function expenseEdit($id){
        $data = DailyExpense::findOrFail($id);


        // //All investment
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
        // return $business_list;
        return [
            'id'     => $data->id,
            'business'  => $business_list,
            'amount' => $data->amount,
            'remark' => $data->remark,
        ];

    }

    /**
     * Update Daily Expense
     */
    public function expenseUpdate(Request $request){

        DailyExpense::where('id', $request->id)->update([
            'business_id' => $request->business_id,
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
     * Delete daily expense
     */
    public function expenseDelete(Request $request){
        DailyExpense::where('id', $request->id)->delete();
        $notification = [
            'message' => 'Data deleted successfully',
            'alert-type' => 'error',
        ];

        return redirect()->back()->with($notification);
    }
}