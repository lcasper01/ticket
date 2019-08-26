<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('title')->comment('Заголовок');
            $table->string('slug');
            $table->text('body')->comment('Текст');
            $table->boolean('status')->default(false)->comment('False, не завершен тикет');
            $table->unsignedInteger('user_id')->comment('Автор тикета');
            $table->string('responsible_user')->comment('Ответственный за тикет');
            $table->string('file_name')->nullable()->comment('Прикрепленный файл');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
