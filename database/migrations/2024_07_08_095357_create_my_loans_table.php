<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_loans', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('customer_id');
                $table->decimal('amount', 10, 2);
                $table->text('loan_purpose')->nullable();
                $table->string('status')->default('pending');
                $table->string('repayment_status')->default('unpaid');
                $table->decimal('total_repayment', 15, 2)->default(0);
                $table->decimal('remaining_amount', 15, 2)->default(0);
                $table->timestamps();

                $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::dropIfExists('my_loans');
    }
}