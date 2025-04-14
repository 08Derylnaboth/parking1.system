<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
Use App\Models\Garage;
Use App\Models\SpotAttribute;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('garage_spot_attributes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(model:Garage::class);
            $table->foreignIdFor(model:SpotAttribute::class);
            $table->integer(column:'price_per_hour')->comment(comment:'cents');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('garage_spot_attributes');
    }
};
