<?php

use App\Models\Amenity;
use App\Models\Property;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('amenities', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name')->unique()->rules([
                'required',
                'min:3'
            ]);
            $table->text('description')->nullable();
            $table->foreignUlid('agent_id')->required();
            $table->timestamps();
        });

        Schema::create('amenity_property', function (Blueprint $table) {
            $table->id();
            $table->foreignUlid('amenity_id')->constrained()->cascadeOnDelete();
            $table->foreignUlid('property_id')->constrained()->cascadeOnDelete();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('amenities');
        Schema::dropIfExists('amenity_property');
    }
};
