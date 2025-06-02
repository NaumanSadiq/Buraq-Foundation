<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('approved_by_super_admin')->default(0);
            $table->integer('approved_by_admin')->default(0);
            $table->unsignedBigInteger('approved_by_super_admin_id')->nullable();
            $table->unsignedBigInteger('approved_by_admin_id')->nullable();
            $table->string('name');
            $table->string('father_or_husband_name');
            $table->integer('age');
            $table->string('martial_status');
            $table->string('cnic');
            $table->string('education');
            $table->integer('family_members');
            $table->integer('total_men');
            $table->integer('total_women');
            $table->integer('total_children');
            $table->string('address');
            $table->string('home_ownership');
            $table->string('rent')->nullable();
            $table->string('home_area');
            $table->string('source_of_income');
            $table->decimal('monthly_income');
            $table->decimal('total_expenses');
            $table->string('account_number');
            $table->string('phone_number');
            $table->string('other_financial_support')->nullable();
            $table->text('application_detail');
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
        Schema::dropIfExists('application_forms');
    }
}
