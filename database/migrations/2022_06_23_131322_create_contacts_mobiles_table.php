<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsMobilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts_mobiles', function (Blueprint $table) {
            $table->integer("contact_id");
            $table->foreign("contact_id")->references("id")->on("users");
            $table->string("mobile_num" , 14)->unique();
            $table->primary(["contact_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts_mobiles');
    }
}
