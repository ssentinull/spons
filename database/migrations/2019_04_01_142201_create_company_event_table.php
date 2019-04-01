<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_event', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('student_confirmation_status');
            $table->boolean('company_confirmation_status');
            $table->integer('company_id')->unsigned();
            $table->integer('event_id')->unsigned();
            $table->integer('document_id')->unsigned();
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
        Schema::dropIfExists('company_event');
    }
}
