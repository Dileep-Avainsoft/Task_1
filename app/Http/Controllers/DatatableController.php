<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employee;

class DatatableController extends Controller
{
    public function table() {
        return view("emp_table");
    }
    public function tableget(Request $request) {
        $draw 				= 		$request->get('draw'); // Internal use
        $start 				= 		$request->get("start"); // where to start next records for pagination
        $rowPerPage 		= 		$request->get("length"); // How many recods needed per page for pagination

        $orderArray 	   = 		$request->get('order');
        $columnNameArray 	= 		$request->get('columns'); // It will give us columns array

        $searchArray 		= 		$request->get('search');
        $columnIndex 		= 		$orderArray[0]['column'];  // This will let us know,
                                                            // which column index should be sorted
                                                            // 0 = id, 1 = name, 2 = email , 3 = created_at

        $columnName 		= 		$columnNameArray[$columnIndex]['data']; // Here we will get column name,
                                                                        // Base on the index we get

        $columnSortOrder 	= 		$orderArray[0]['dir']; // This will get us order direction(ASC/DESC)
        $searchValue 		= 		$searchArray['value']; // This is search value



        $users = Employee::select('employees.*', 'companies.name as company_name')
        ->leftJoin('companies', 'employees.company', '=', 'companies.id');
        $total =$users->count();




        // $totalFilter = $total;

      $totalFilter  = Employee::select('employees.*', 'companies.name as company_name')
        ->leftJoin('companies', 'employees.company', '=', 'companies.id');
        if(!empty($searchValue)) {

      $totalFilter= $totalFilter->where('first_name','LIKE','%'.$searchValue.'%');
            // $totalFilter= $totalFilter->where('email','LIKE','%'.$searchValue.'%');
         }

        $totalFilter =$totalFilter->count();

        $arrData = $employees = Employee::select('employees.*', 'companies.name as company_name')
        ->leftJoin('companies', 'employees.company', '=', 'companies.id');


        $arrData= $arrData->skip($start)->take($rowPerPage);
        $arrData= $arrData->orderBy($columnName,$columnSortOrder);

        //codition search

        if(!empty($searchValue)) {

            $arrData= $arrData->where('first_name','LIKE','%'.$searchValue.'%');
            // $arrData= $arrData->where('email','LIKE','%'.$searchValue.'%');
         }


        $arrData = $arrData->get();

        $response = array(
            "draw" => intval($draw),
            "recordsTotal" => $total,
            "recordsFiltered" => $totalFilter,
            "data" => $arrData,
        );

return response()->json($response);

}



// getting Company table
public function company_table(){
    return view('company_table');
}
public function get_company_table(Request $request){


    $draw 				= 		$request->get('draw'); // Internal use
    $start 				= 		$request->get("start"); // where to start next records for pagination
    $rowPerPage 		= 		$request->get("length"); // How many recods needed per page for pagination

    $orderArray 	   = 		$request->get('order');
    $columnNameArray 	= 		$request->get('columns'); // It will give us columns array

    $searchArray 		= 		$request->get('search');
    $columnIndex 		= 		$orderArray[0]['column'];  // This will let us know,
                                                        // which column index should be sorted
                                                        // 0 = id, 1 = name, 2 = email , 3 = created_at

    $columnName 		= 		$columnNameArray[$columnIndex]['data']; // Here we will get column name,
                                                                    // Base on the index we get

    $columnSortOrder 	= 		$orderArray[0]['dir']; // This will get us order direction(ASC/DESC)
    $searchValue 		= 		$searchArray['value']; // This is search value




    $users = \DB::table("companies");
    $total =$users->count();




    // $totalFilter = $total;

  $totalFilter =\DB::table("companies");
    if(!empty($searchValue)) {

  $totalFilter= $totalFilter->where('name','LIKE','%'.$searchValue.'%');
        // $totalFilter= $totalFilter->where('email','LIKE','%'.$searchValue.'%');
     }

    $totalFilter =$totalFilter->count();

    $arrData =\DB::table("companies");


    $arrData= $arrData->skip($start)->take($rowPerPage);
    $arrData= $arrData->orderBy($columnName,$columnSortOrder);

    //codition search

    if(!empty($searchValue)) {

        $arrData= $arrData->where('name','LIKE','%'.$searchValue.'%');
        // $arrData= $arrData->where('email','LIKE','%'.$searchValue.'%');
     }


    $arrData = $arrData->get();

    $response = array(
        "draw" => intval($draw),
        "recordsTotal" => $total,
        "recordsFiltered" => $totalFilter,
        "data" => $arrData,
    );

return response()->json($response);



}
}


// $response = array(
//             "draw" => intval($draw),
//             "recordsTotal" => $total,
//             "recordsFiltered" => $totalFilter,
//             "data" => $arrData,
//         );


//         return response()->json($response);

