<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('phone', 30);
            $table->string('gender', 30)->nullable();
            $table->string('country', 80)->nullable();
            $table->unsignedTinyInteger('age');
            $table->string('preferred_time', 50);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
