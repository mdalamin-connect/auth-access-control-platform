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
        if (!Schema::hasTable('salaries')) {
            Schema::create('salaries', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('employee_id');
                $table->decimal('basic_salary', 10, 2);
                $table->decimal('house_rent', 10, 2)->default(0);
                $table->decimal('medical_allowance', 10, 2)->default(0);
                $table->decimal('transport_allowance', 10, 2)->default(0);
                $table->decimal('other_allowance', 10, 2)->default(0);
                $table->date('effective_from');
                $table->text('note')->nullable();
                $table->timestamps();

                $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salaries');
    }
};
