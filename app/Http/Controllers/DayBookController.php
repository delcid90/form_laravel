<?php

namespace App\Http\Controllers;

use App\Http\Requests\DayBookRequest as DayBookRequest;
use App\DayBook;
class DayBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $r=['0'=>'receipt', '1'=>'payment', '2'=>'purchase', '3'=>'sales'];

         $daybooks = DayBook::all();
         return view('daybook.dashboard')->with('daybooks', $daybooks)->with('r',$r);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

         return view('daybook.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DayBookRequest $request)
    {
        
        $daybook = DayBook::create($request->all());

        if($daybook){        
           return redirect()->back()->with('message', 'Saved Data!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $daybook=DayBook::find($id);
        $r=['0'=>'receipt', '1'=>'payment', '2'=>'purchase', '3'=>'sales'];
        return view('daybook.edit')->with('daybook',$daybook)->with('r',$r);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DayBookRequest $request, $id)
    {

        $daybook = DayBook::find($id);
        
        $daybook->date =$request->date;
        $daybook->particular=$request->particular;
        $daybook->voucher_type=$request->voucher_type;
        $daybook->voucher_number=$request->voucher_number;
        $daybook->debit_amount=$request->debit_amount;
        $daybook->create_amount=$request->create_amount;
        $daybook->save();

        if($daybook){        
           return redirect()->to('/daybook')->with('message', 'Updated Data!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $daybook = DayBook::find($id);
        $daybook->delete();
        if($daybook){        
           return redirect()->to('/daybook')->with('message', 'Delated Data!');
        }
    }
}
