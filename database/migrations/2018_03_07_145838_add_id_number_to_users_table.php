<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdNumberToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->string('id_number', 20)->unique()->nullable()->after('phone');
            $table->integer('invited_by')->unsigned()->nullable()->after('status');

            $table->foreign('invited_by')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {

            $table->dropColumn('id_number');

            $table->dropForeign('users_invited_by_foreign');
            $table->dropColumn('invited_by');
        });
    }
}
