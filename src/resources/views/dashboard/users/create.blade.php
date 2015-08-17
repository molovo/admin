@extends( 'admin::dashboard.users' )

@section( 'title', 'Create User' )

@section( 'page' )
  <?php
    $formOptions = [
      'action' => '\Molovo\Admin\Http\Controllers\UsersController@store',
      'class' => 'admin-form'
    ];
  ?>

  {!! Form::model( new \Molovo\Admin\Models\User, $formOptions ) !!}

    <legend>User Details</legend>

    <fieldset class="admin-form--title">
      {!! Form::label( 'name', 'User Name' ) !!}
      {!! Form::text( 'name' ) !!}
    </fieldset>

    <fieldset class="admin-form--product-price">
      <div class="admin-form--field-third">
        {!! Form::label( 'net_price', 'Net Price' ) !!}
        {!! Form::number( 'net_price', null, [ 'step' => 0.01, 'class' => 'currency' ] ) !!}
      </div>

      <div class="admin-form--field-third">
        {!! Form::label( 'tax', 'Tax' ) !!}
        {!! Form::number( 'tax', null, [ 'step' => 0.01, 'class' => 'percentage' ] ) !!}
      </div>

      <div class="admin-form--field-third">
        {!! Form::label( 'gross_price', 'Gross Price' ) !!}
        {!! Form::number( 'gross_price', null, [ 'step' => 0.01, 'class' => 'currency' ] ) !!}
      </div>
    </fieldset>
  {!! Form::close() !!}
@stop