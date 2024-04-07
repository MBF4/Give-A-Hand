<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('volunteer_opportunities', function (Blueprint $table) {
            $table->string('specialization')->nullable();
        });
    }

    public function down()
    {
        Schema::table('volunteer_opportunities', function (Blueprint $table) {
            $table->dropColumn('specialization');
        });
    
    }
};
