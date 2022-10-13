<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeFieldAtUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->longText('addres')->nullable()->change();
            $table->longText('provinces_id')->nullable()->change();
            $table->longText('regencies_id')->nullable()->change();
            $table->integer('zip_code')->nullable()->change();
            $table->string('country')->nullable()->change();
            $table->string('phone_number')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->longText('addres')->nullable(false)->change();
            $table->longText('provinces_id')->nullable(false)->change();
            $table->longText('regencies_id')->nullable(false)->change();
            $table->integer('zip_code')->nullable(false)->change();
            $table->string('country')->nullable(false)->change();
            $table->string('phone_number')->nullable(false)->change();
        });
    }
}
