<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_shms', function (Blueprint $table) {
            $table->id();
            $table->float("gyroX");
            $table->float("gyroY");
            $table->float("gyroZ");
            $table->float("accelX");
            $table->float("accelY");
            $table->float("accelZ");
            $table->float("strainValue");
            $table->float("temperature");
            $table->float("humidity");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_shms');
    }
};
