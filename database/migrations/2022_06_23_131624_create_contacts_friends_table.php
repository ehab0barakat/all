<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsFriendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts_friends', function (Blueprint $table) {
            $table->integer("contact_id");
            $table->integer("friend_id");
            $table->foreign("contact_id")->references("id")->on("contacts");
            $table->foreign("friend_id")->references("id")->on("contacts");
            $table->primary(["contact_id","friend_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts_friends');
    }
}
