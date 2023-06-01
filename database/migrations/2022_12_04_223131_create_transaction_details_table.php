<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->uuid('transactions_uuid');
            $table->string('username');
            $table->string('nationality');
            $table->boolean('is_visa');
            $table->date('doe_passport');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('transactions_uuid')->references('uuid')->on('transactions')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaction_details');
    }
};
