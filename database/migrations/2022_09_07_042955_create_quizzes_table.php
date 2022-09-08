<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->text('topic')->nullable();
            $table->text('detail')->nullable();

            $table->string('option1',150)->nullable();
            $table->string('option2',150)->nullable();
            $table->string('option3',150)->nullable();
            $table->string('option4',150)->nullable();
            $table->string('correct_option',150)->nullable()->comment('Must be option name');
            $table->tinyInteger('correct_mark',false,3)->default(0);
            $table->tinyInteger('status')->default(\App\Models\Quiz::ACTIVE);

            $table->unsignedBigInteger('created_by', false);
            $table->unsignedBigInteger('updated_by', false)->nullable();
            $table->foreign('created_by')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('updated_by')->references('id')->on('users')->cascadeOnDelete();
            $table->softDeletes();
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
        Schema::table('quizzes',function (Blueprint $table){

            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);
        });

        Schema::dropIfExists('quizzes');
    }
}
