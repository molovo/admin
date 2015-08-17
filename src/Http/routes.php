<?php

Route::group( [ 'prefix' => '_admin' ], function() {
  Route::get( '/', function() {
    return view( 'admin::layouts.dashboard' );
  } );

  Route::resource( 'users', 'UsersController' );
} );

