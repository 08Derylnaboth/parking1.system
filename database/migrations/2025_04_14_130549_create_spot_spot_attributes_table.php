<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
Use App\Models\Spot;
Use App\Models\SpotAttribute;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('spot_spot_attributes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(model:Spot::class); 
            $table->foreignIdFor(model:SpotAttribute::class);
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spot_spot_attributes');
    }
};
