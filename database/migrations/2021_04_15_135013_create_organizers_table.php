<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizers', function (Blueprint $table) {
            $table->id('id');
            $table->char('name', 25);
            $table->string('username')->unique();
            $table->string('password');
            $table->char('telephone',9);
            $table->char('email', 50)->unique();
            $table->char('link_web', 100)->nullable();
            $table->char('link_instagram', 100)->nullable();
            $table->char('link_facebook', 100)->nullable();
            $table->char('link_twitter', 100)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            
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
        Schema::dropIfExists('organizers');
    }
}
