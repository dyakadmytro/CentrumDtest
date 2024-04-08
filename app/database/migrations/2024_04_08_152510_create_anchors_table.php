<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('anchors', function (Blueprint $table) {
            $table->id();
            $table->string('title', 64)->nullable();
            $table->string('url', 2048);
            $table->string('link', 8);
            $table->integer('ttl')->unsigned();
            $table->bigInteger('max_follow')->unsigned();

            $table->index('link', 'link_slug_index', 'hash');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('anchors', function (Blueprint $table){
            $table->dropIndex('link_slug_index');
        });
        Schema::dropIfExists('anchors');
    }
};
