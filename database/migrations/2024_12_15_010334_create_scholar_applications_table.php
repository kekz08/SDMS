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
        Schema::create('scholar_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key for the user
            $table->unsignedBigInteger('scholarship_id'); // Foreign key for the scholarship

            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('sex');
            $table->date('birthdate');
            $table->string('track');
            $table->string('strand')->nullable();
            $table->string('school');
            $table->string('talents')->nullable();
            $table->text('address');
            $table->string('guardian')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('guardian_contact')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->date('appointment_date');
            $table->json('uploaded_files')->nullable(); // For uploaded files
            $table->enum('status', ['Pending', 'Approved', 'Rejected'])->default('Pending');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Assuming the 'users' table exists
            $table->foreign('scholarship_id')->references('id')->on('scholarships')->onDelete('cascade'); // Assuming the 'scholarships' table exists
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scholar_applications');
    }
};
