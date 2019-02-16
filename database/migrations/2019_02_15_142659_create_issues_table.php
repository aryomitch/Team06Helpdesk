<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->increments('id');
            $table->string('caller_id');
            $table->string('helpdesk_id');
            $table->string('software')->nullable();
            $table->string('operating_system')->nullable();
            $table->mediumText('description');
            $table->string('category');
            $table->string('priority');
            $table->boolean('completed')->nullable();
            $table->mediumText('solution')->nullable();
            $table->string('assigned_id')->nullable();
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
        Schema::dropIfExists('issues');
    }
}
