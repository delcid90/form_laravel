@extends('layout.master')

@section('content')
       
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <h2 class="sub-header">Section Day Book</h2>
           @if(session()->has('message'))
                  <div class="alert alert-success">
                      {{ session()->get('message') }}
                  </div>
              @endif
            @if(isset($daybooks))
                @if(count($daybooks) < 1)
                    <div class="alert alert-warning">
                      <p>No Data</p>
                    </div>
                @else
                     <div class="table-responsive">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>Date</th>
                              <th>Particular</th>
                              <th>Voucher Type</th>
                              <th>Voucher Number</th>
                              <th>Debit Amount</th>
                              <th>Create Amount</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($daybooks as $db)
                                <tr>
                                  <td>{{$db->date}}</td>
                                  <td>{{$db->particular}}</td>
                                  <td>{{$r[$db->voucher_type]}}</td>
                                  <td>{{$db->voucher_number}}</td>
                                  <td>{{$db->debit_amount}}</td>
                                  <td>{{$db->create_amount}}</td>
                                  <td> 
                                    <a type="button" href="{{url('daybook',$db->id )}}/edit" class="btn btn-default btn-xs">
                                      <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit
                                    </a>
                                    {!!Form::open(array('class'=>'form-horizontal' ,'route' => array('daybook.destroy', $db->id))) !!}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-warning btn-xs">
                                      <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete
                                    </button>
                                     {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                @endif
            @endif
         
      
@endsection