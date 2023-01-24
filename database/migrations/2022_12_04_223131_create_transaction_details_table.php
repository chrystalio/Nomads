<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transactions_id')->constrained('transactions');
            $table->string('username');
            $table->string('nationality');
            $table->boolean('is_visa');
            $table->date('doe_passport');
            $table->softDeletes();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaction_details');
    }
};
