<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_closed')->default(0);
            $table->string('close_msg')->default("الموقع مغلق الان للصيانة");
            $table->boolean('allow_drivers')->default(0);
            $table->boolean('allow_stores')->default(0);
            $table->double('kilo')->default(1.0);
            $table->text('contact')->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
