<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToVolunteerOpportunitiesTable extends Migration
{
    public function up()
    {
        Schema::table('volunteer_opportunities', function (Blueprint $table) {
            $table->boolean('status')->default(true);
        });
    }

    public function down()
    {
        Schema::table('volunteer_opportunities', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}

