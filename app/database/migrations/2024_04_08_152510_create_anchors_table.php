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
            $table->string('slug', 8);
            $table->integer('ttl')->unsigned();
            $table->bigInteger('max_follows')->unsigned();
            $table->bigInteger('followed')->default(0)->unsigned();
            $table->timestamp('created_at')->useCurrent();

            $table->index('slug', 'link_slug_index', 'hash');
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
