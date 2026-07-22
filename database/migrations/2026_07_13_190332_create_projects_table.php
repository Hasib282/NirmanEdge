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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('slug');
            $table->text('location');
            $table->string('client');
            $table->unsignedBigInteger('type_id'); // services id
            $table->integer('year');
            $table->text('image');
            $table->text('details')->nullable();
            $table->tinyInteger('status');
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('services')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
