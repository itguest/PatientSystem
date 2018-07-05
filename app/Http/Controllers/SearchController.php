<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Appointment;
use DB;

class SearchController extends Controller
{
    // search page
    public function index(){
        return view('search.search');
    }
    // search request
    public function search(Request $request){
    echo"enterd";
        if($request->ajax()){
            // `check if patient number entered 
            if ( $request['p_number'] ) {
                $pa_data = Patient::where('P_number', '=', $request['p_number'])->get();
                $pa_id   = $pa_data->pluck('id')->first();
                $pa_name = $pa_data->pluck('P_name')->first();
                $apps = Appointment::where('Patient_id', '=',$pa_id )->get();
            }else{
                $apps = Appointment::where('a_date', '=',$request['p_number'] )
                ->where('color', 'blue')
                ->get();
            }
            // get p_id from appointments

                $output="";
                // //FIXME: change the query
                // $apps=DB::table('apps')->where('title','LIKE','%'.$request->search."%")->get();
                // $articles = \App\Article::where('foo', 'bar')
                //     ->where('color', 'blue')
                //     ->orWhere('name', 'like', '%John%')
                //     ->whereIn('id', [1, 2, 3, 4, 5])
                //     ->get();

                if($apps){
                
                foreach ($apps as $key => $app) {
                
                $output.='<tr ondblclick="alert()">'.
                '<td>'.$app->a_date.'</td>'.
                
                '<td>'.$request['p_number'].'</td>'.
                '<td>'. $pa_name.'</td>'.
                '<td>'. $app->a_clinic.'</td>'.
                '<td>'. $app->a_cost.'</td>'.
                '<td>'. $app->a_status.'</td>'.
                '</tr>';
                
                }
            
            return Response($output);
            }
        }
    
    
    
    }


}//class
