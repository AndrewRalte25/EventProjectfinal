<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $event) {
            $event->id();
            $event->string('name');
            $event->string('Location');
            $event->string('Opening');
            $event->string('ContactInfo');
            $event->string('Image');
            $event->string('Price');
            $event->unsignedBigInteger('cate_id');
            $event->timestamps();

            $event->foreign('cate_id')
                  ->references('id')
                  ->on('categories')
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
        Schema::dropIfExists('events');
    }
};
