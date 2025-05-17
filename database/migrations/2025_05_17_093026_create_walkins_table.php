<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('walkins', function (Blueprint $table) {
            $table->id();  // Auto-increment primary key
            $table->string('name');
            $table->string('phone_number');
            $table->string('email')->nullable();
            $table->text('message'); // Default to "Walk in"
            $table->enum('type', ['new', 'pending', 'done'])->default('new'); // Enum for type
            $table->timestamps(); // Created and updated time
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('walkins');
    }
};
