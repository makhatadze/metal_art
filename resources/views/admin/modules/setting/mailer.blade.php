@extends('admin.layouts.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User Create</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Basic Form Elements
                </div>


                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-8">
                            {!! Form::open() !!}
                            <div class="form-row mb-4">
                                <div class="col">
                                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                        {{ Form::label('password_confirmation', 'სახელი', ['class' => 'font-helvetica']) }}
                                        {{ Form::password('name', ['class' => 'form-control', 'type' => 'text']) }}
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                            {{ $errors->first('name') }}
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                        {{ Form::label('password_confirmation', 'პაროლის გამეორება', ['class' => 'font-helvetica']) }}
                                        {{ Form::password('email', ['class' => 'form-control', 'type' => 'text']) }}
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                            {{ $errors->first('email') }}
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-info my-4 btn-block" type="submit">Update</button>
                            {!! Form::close() !!}
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->


    </div>

@endsection