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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            // we can chain on another method called unique to make sure the usernames are unique
            $table->string('username')->unique();;
            // add a column to datase -> means access a object's method
            // call the nulable method to allow the column to be empty

            // 'php artisan migrate:fresh' to delete al tablesand data and reload the table with the above changes
            // otherwise to make changes without loosing dat you have to create a new migrations file
            // 'php artisan make:migration add_favorite_color_column' to create it
            $table->string('avatar')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
