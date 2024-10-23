<?php

use App\Models\Amenity;
use App\Models\Property;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */

    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name')->unique()->rules([
                'required',
                'min:3',
            ]);
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2)->required();
            $table->enum('type', ['house', 'apartment', 'penthouse'])->required();
            $table->enum('status', ['on-sale', 'sold', 'building'])->required();
            $table->foreignUlid('agent_id')->references('id')->on('users')->required()->cascadeOnDelete();
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
