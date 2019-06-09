<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_organizations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('established_in');
            $table->string('address');
            $table->string('major', 100);
            $table->string('university', 100);
            $table->longText('description');
            $table->string('picture', 20)->nullable();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_organizations');
    }
}
