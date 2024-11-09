<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_name');
            $table->text('description')->nullable();
            $table->integer('credit_hours');
            $table->unsignedBigInteger('admin_id')->nullable(); // Use unsignedBigInteger for foreign key
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {

            $table->dropForeign(['admin_id']);
        });

        Schema::dropIfExists('courses');
    }
}
