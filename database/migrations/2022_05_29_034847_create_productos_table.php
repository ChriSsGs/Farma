<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',200);
            $table->string('descripcion',1000);
            $table->string('observacion',500);
            $table->double('precio');
            $table->integer('cantidad');
            $table->integer('stock');
            $table->string('imagen');
            $table->date('caducidad');
            $table->string('estado',3)->default('ACT');
            $table->unsignedInteger('categoria_id');
            $table->unsignedInteger('subcategoria_id');
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
        Schema::dropIfExists('productos');
    }
};
