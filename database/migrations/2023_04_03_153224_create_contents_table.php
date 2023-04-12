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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('tmdb_id')->unique()->nullable();
            $table->string('title');
            $table->string('slug');
            $table->string('cover')->nullable();
            $table->string('poster')->nullable();
            $table->string('content_type');
            $table->string('duration')->nullable();
            $table->string('trailer')->nullable();
            $table->string('release_date');
            $table->text('overview');
            $table->integer('view')->default(0);
            $table->decimal('rating', 10, 1);
            $table->boolean('publish');
            $table->boolean('feature');
            $table->boolean('member_only');
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
        Schema::dropIfExists('contents');
    }
};
