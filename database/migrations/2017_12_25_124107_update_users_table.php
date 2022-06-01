<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->string('phone', 100)->after('email')->unique()->nullable();
            $table->string('photo', 255)->after('phone')->nullable();
            $table->text('location_text')->after('photo')->nullable();
            $table->string('lat', 255)->after('location_text')->nullable();
            $table->string('long', 255)->after('lat')->nullable();
            $table->string('conf_code')->after('long')->nullable();
            $table->boolean('conf_status')->after('conf_code')->default(false);
            $table->integer('conf_count')->after('conf_status')->nullable();
            $table->integer('group_id')->after('conf_count')->unsigned()->nullable();
            $table->boolean('user_type')->after('group_id'); // 1 admin - 2 company - 3 user
            $table->boolean('is_admin')->after('user_type')->default(false);
            $table->boolean('status')->after('is_admin')->default(true);

            $table->foreign('group_id')
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

    }
}
