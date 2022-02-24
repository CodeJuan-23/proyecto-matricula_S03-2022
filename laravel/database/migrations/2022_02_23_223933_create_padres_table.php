<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePadresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('padres', function (Blueprint $table) {
            $table->uuid("id")->primary;
            $table->string("dni_padre",8);
            $table->string("nombres_padre",30);
            $table->string("apellido_paterno_padre",20);
            $table->string("apellido_materno_padre",20);
            $table->string("direccion_padre",40);
            $table->string("distrito_padre",30);
            $table->string("telefono_padre",10);
            $table->string("celular_padre",9);
            $table->string("email_padre",60);
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
        Schema::dropIfExists('padres');
    }
}
