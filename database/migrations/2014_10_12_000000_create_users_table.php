<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('email', 150)->unique();
            $table->string('password');
            $table->unsignedInteger('role_id')->default(2);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        //this is just for the testing purposes
        // TESTING P/W: 123456
        $data = array(
            array('first_name'=>'Super', 'last_name'=>'Admin', 'email'=>'admin@sales.com', 'password'=>'$2y$10$zE2ziHLu3QwePI4KR3I9w.gnqNM2puiyT6xpen.OLH0wxDtGs36LW', 'role_id'=>1),
            array('first_name'=>'Don', 'last_name'=>'Parker', 'email'=>'don_parker@sales.com', 'password'=>'$2y$10$zE2ziHLu3QwePI4KR3I9w.gnqNM2puiyT6xpen.OLH0wxDtGs36LW', 'role_id'=>2),
        );
        DB::table('users')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
