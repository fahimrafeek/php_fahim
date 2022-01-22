<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('role_id');
            $table->unsignedInteger('section_id');
            $table->timestamps();
        });

        //this is just for the testing purposes
        $data = array(
            array('role_id'=>1, 'section_id'=>1),
            array('role_id'=>1, 'section_id'=>2),
            array('role_id'=>2, 'section_id'=>2)
        );
        DB::table('role_permissions')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_permissions');
    }
}
