<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('first_name', 100)->nullable();
            $table->string('last_name', 100)->nullable();
            $table->string('middle_name', 100)->nullable();
            $table->string('maiden_name', 100)->nullable();
            $table->date('birth_date')->nullable();
            $table->string('contact_number', 20)->nullable();
            $table->string('street')->nullable();
            $table->string('city', 100)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('postal_code', 20)->nullable();
            $table->string('status', 20)->nullable();
            $table->string('user_type', 20)->nullable();
            $table->string('marital_status', 20)->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('bio', 255)->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('accepted_terms_at')->nullable();
            $table->timestamp('accepted_privacy_at')->nullable();
            $table->string('password')->nullable();
            $table->string('provider_id')->nullable();
            $table->string('provider', 100);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
