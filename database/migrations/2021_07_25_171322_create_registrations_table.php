<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string("father-name");
            $table->string("phone");
            $table->string("province");
            $table->string("city");
            $table->string("cnic");
            $table->string("email");
            $table->string("education");
            $table->date('birthday');
            $table->string("wing-type");
            $table->string("image");
            $table->string("role")->nullable();
            $table->boolean('is_accepted')->nullable();
            $table->boolean("notification_created")->default(false);
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
        Schema::dropIfExists('registrations');
    }
}
