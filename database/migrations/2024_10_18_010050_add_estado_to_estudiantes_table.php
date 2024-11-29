<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('estudiantes', function (Blueprint $table) {
            $table->boolean('estado')->default(1); // Estado por defecto activo (1)
        });
    }

    public function down()
    {
        Schema::table('estudiantes', function (Blueprint $table) {
            $table->dropColumn('estado');
        });
    }
};
