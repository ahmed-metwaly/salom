<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommissionPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commission_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();

            $table->double('payed', 8, 2);
            $table->double('base', 8, 2);
//            $table->date('last_owed_pay');

            $table->timestamps();

            $table->foreign('company_id')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commission_payments');
    }
}
