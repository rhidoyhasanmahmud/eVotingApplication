<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->tinyInteger('display')->default(1);
            $table->timestamps();
        });

        Schema::create('group_permission', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::table('group_permission', function (Blueprint $table) {
            $table->unique(['group_id', 'permission_id']);
            $table->foreignId('permission_id')->constrained()->onDelete('cascade');
            $table->foreignId('group_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
