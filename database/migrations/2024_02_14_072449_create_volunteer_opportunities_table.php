<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteerOpportunitiesTable extends Migration
{
    public function up()
    {
        Schema::create('volunteer_opportunities', function (Blueprint $table) {
            $table->id(); // Auto-incremental primary key
            $table->foreignId('user_id')->constrained(); // Foreign key referencing users table
            $table->string('event_name');
            $table->text('description');
            $table->string('location');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('volunteer_opportunities');
    }
}
