<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteerApplicationsTable extends Migration
{
    public function up()
    {
        Schema::create('volunteer_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('opportunity_id');
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
            // Other existing fields (if any)
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('opportunity_id')->references('id')->on('volunteer_opportunities');
        });
    }

    public function down()
    {
        Schema::dropIfExists('volunteer_applications');
    }
}
