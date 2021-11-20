<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id');
            $table->string('course_name')->nullable();
            $table->string('department_name')->nullable();
            $table->string('session')->nullable();
            $table->string('batch_no')->nullable();
            $table->string('enrollment_no')->nullable();
            $table->string('roll_no')->nullable();
            $table->string('name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('guardian_name')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->text('address')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('landline')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('education_qualification')->nullable();
            $table->string('last_course')->nullable();
            $table->string('marks_secured')->nullable();
            $table->string('cgpa')->nullable();
            $table->string('percentage')->nullable();
            $table->string('division')->nullable();
            $table->string('grade')->nullable();
            $table->string('current_sem')->nullable();
            $table->string('photo')->nullable();
            $table->string('signature')->nullable();
            $table->boolean('status')->default('0');
            $table->text('desc')->nullable();
            $table->string('amount')->nullable();
            $table->boolean('paid')->default('0');
            $table->string('payment_id')->nullable();
            $table->string('moderator_id')->nullable();
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
        Schema::dropIfExists('applications');
    }
}
