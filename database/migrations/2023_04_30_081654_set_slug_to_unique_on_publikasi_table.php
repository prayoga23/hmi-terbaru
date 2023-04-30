<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SetSlugToUniqueOnPublikasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('publikasi', function (Blueprint $table) {
            $table->unique('slug', 'publikasi_slug_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('publikasi', function (Blueprint $table) {
            $table->dropUnique('publikasi_slug_unique');
        });
    }
}
