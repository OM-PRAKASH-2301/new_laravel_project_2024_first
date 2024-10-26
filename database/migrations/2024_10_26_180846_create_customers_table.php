<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->unique();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('username')->unique();
            $table->string('gender');
            $table->string('contact_no')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('country');
            $table->string('state');
            $table->string('district');
            $table->text('address');
            $table->string('pincode');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
