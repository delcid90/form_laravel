@extends('layout.master')

@section('content')
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
              @if(session()->has('message'))
                  <div class="alert alert-success">
                      {{ session()->get('message') }}
                  </div>
              @endif
            {!!Form::model($daybook, array('class'=>'form-horizontal' ,'route' => array('daybook.update', $daybook->id))) !!}
            <fieldset>
            <input type="hidden" name="_method" value="PUT">
            <!-- Form Name -->
            <legend>Section Day Book - Create</legend>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="date">Date</label>  
              <div class="col-md-4">
              <input id="date" name="date" type="text" placeholder="date" class="form-control input-md" value="{{ $daybook->date }}"">
              @if ($errors->has('date'))
                  <span class="error help-block">{{ $errors->first('date') }}</span>
              @endif
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="particular">Particular</label>  
              <div class="col-md-4">
              <input id="particular" name="particular" type="text" placeholder="Particular" class="form-control input-md" value="{{ $daybook->particular }}"">
               @if ($errors->has('particular'))
                  <span class="error help-block">{{ $errors->first('particular') }}</span>
              @endif
              </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="voucher_type">Voucher Type</label>
              <div class="col-md-4">
                {!! Form::select('voucher_type', $r, $daybook->voucher_type, ['class' => 'form-control']) !!}
                @if ($errors->has('voucher_type'))
                  <span class="error help-block">{{ $errors->first('voucher_type') }}</span>
              @endif
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="voucher_number">Voucher Number</label>  
              <div class="col-md-4">
              <input id="voucher_number" name="voucher_number" type="text" placeholder="Voucher Number" class="form-control input-md" value="{{ $daybook->voucher_number }}"">
              @if ($errors->has('voucher_number'))
                  <span class="error help-block">{{ $errors->first('voucher_number') }}</span>
              @endif
              </div>
            </div>

            <!-- Prepended text-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="debit_amount">Debit Amount</label>
              <div class="col-md-4">
                <div class="input-group">
                  <span class="input-group-addon">$</span>
                  <input id="debit_amount" name="debit_amount" class="form-control" placeholder="Debit Amount" type="text" value="{{ $daybook->debit_amount }}"">
                </div>
                @if ($errors->has('debit_amount'))
                  <p class="error help-block">{{ $errors->first('debit_amount') }}</p>
              @endif
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="create_amount">Create Amount</label>  
              <div class="col-md-4">
              <input id="create_amount" name="create_amount" type="text" placeholder="Create Amount" class="form-control input-md" value="{{ $daybook->create_amount }}"">
              @if ($errors->has('create_amount'))
                  <span class="error help-block">{{ $errors->first('create_amount') }}</span>
              @endif
              </div>
            
            
            </div>
            <div class="form-group">
              <div class="col-md-4 col-md-offset-4">
                <button type="submit" >Send</button>
              </div>
            </div>
            </fieldset>
            {!! Form::close() !!}

        </div>
@endsection