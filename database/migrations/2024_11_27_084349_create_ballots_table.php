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
        Schema::create('ballots', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('election_id'); // Foreign key column
            $table->foreign('election_id')->references('id')->on('elections')->onDelete('cascade');
            $table->string('ballot_name');
            $table->text('ballot_description');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
            $table->index('election_id'); // Index for better performance on queries related to election_id
        });

    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ballots');
    }
};
