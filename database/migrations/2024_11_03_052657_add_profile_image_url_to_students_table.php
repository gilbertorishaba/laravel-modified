<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileImageUrlToStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            // Checking if the column exists before adding it
            if (!Schema::hasColumn('students', 'profile_image_url')) {
                $table->string('profile_image_url')->nullable(); // Column to store image URL
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            // Drop the column if it exists
            if (Schema::hasColumn('students', 'profile_image_url')) {
                $table->dropColumn('profile_image_url');
            }
        });
    }
}
