<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImageColumnToAduan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() //gawe kolom gambar : php artisan make:migration add_image_column_to_aduan 
    {
        Schema::table('aduan',function (Blueprint $table){//"ADUAN" -> HARUS SAMA DENGAN TABEL DI DATABASE
            $table->string('gambar'); //terserah namae
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('aduan',function (Blueprint $table){
            $table->string('gambar');
        });
    }
}
