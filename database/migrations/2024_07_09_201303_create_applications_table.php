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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('applicationId');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('city');
            $table->string('state')->nullable();
            $table->string('lga')->nullable();
            $table->string('nationality')->default('Nigerian');
            $table->enum('gender', ['male', 'female']);
            $table->enum('maritalStatus', ['single', 'married', 'divorced'])->default('single');
            $table->enum('religion', ['christianity', 'islam', 'other'])->default('christianity');
            $table->string('fslc');
            $table->string('olevel');
            $table->enum('status', ['applied', 'pending', 'in progress', 'not admitted']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
