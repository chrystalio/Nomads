<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->uuid('travel_packages_uuid');
            $table->text('image');
            $table->softDeletes();
            $table->timestamps();


            $table->foreign('travel_packages_uuid')->references('uuid')->on('travel_packages')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('galleries');
    }
};
