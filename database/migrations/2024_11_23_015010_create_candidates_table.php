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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ballot_id'); // Foreign key column
            $table->foreign('ballot_id')->references('id')->on('ballots')->onDelete('cascade');
            $table->string('candidate_name');
            $table->string('party')->nullable();
            $table->text('bio')->nullable();
            $table->string('status')->default('active');
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
