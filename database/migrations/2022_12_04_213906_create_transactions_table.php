<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->uuid('travel_packages_uuid');
            $table->foreignId('users_id')->constrained('users');
            $table->integer('additional_visa');
            $table->integer('transaction_total');
            $table->string('transaction_status'); // IN_CART, PENDING, SUCCESS, CANCEL, FAILED
            $table->softDeletes();

            $table->foreign('travel_packages_uuid')->references('uuid')->on('travel_packages')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
