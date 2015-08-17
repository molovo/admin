<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MigrateAdminPackage extends Migration
{

    private $prefix = NULL;

    public function __construct()
    {
        // Get the prefix
        $this->prefix = Config::get('admin.prefix');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $prefix       = $this->prefix;

        Schema::create( $prefix.'users', function ( Blueprint $table ) use( $prefix ) {
            // Role Info
            $table->increments( 'id' );
            $table->integer( 'status' )->unsigned();
            $table->string( 'name' );
            $table->longtext( 'bio' );

            // Login Info
            $table->string( 'username' )->unique();
            $table->string( 'email' )->unique();
            $table->string( 'password' );
            $table->rememberToken();

            // Timestamps
            $table->timestamps();
            $table->softDeletes();
        } );

        Schema::create( $prefix.'roles', function( Blueprint $table ) use ( $prefix ) {
            // Role Info
            $table->increments( 'id' );
            $table->integer( 'status' )->unsigned();
            $table->string( 'name' );
            $table->string( 'short' );

            // Timestamps
            $table->timestamps();
            $table->softDeletes();
        } );

        Schema::create( $prefix.'user_roles', function( Blueprint $table ) use ( $prefix ) {
            $table->integer( 'user_id' )->unsigned();
            $table->integer( 'role_id' )->unsigned();
        } );

        Schema::create( $prefix.'permissions', function( Blueprint $table ) use ( $prefix ) {
            // Permission Info
            $table->increments( 'id' );
            $table->integer( 'status' )->unsigned();
            $table->string( 'name' );
            $table->string( 'short' );

            // Timestamps
            $table->timestamps();
            $table->softDeletes();
        } );

        Schema::create( $prefix.'role_permissions', function( Blueprint $table ) use ( $prefix ) {
            $table->integer( 'role_id' )->unsigned();
            $table->integer( 'permission_id' )->unsigned();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $prefix = $this->prefix;

        Schema::drop( $prefix.'users' );
        Schema::drop( $prefix.'roles' );
        Schema::drop( $prefix.'user_roles' );
        Schema::drop( $prefix.'permissions' );
        Schema::drop( $prefix.'role_permissions' );
    }
}
