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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string(column:'title');
            $table->text(column:'content');
            // $table->enum(column:'state',['draft','published'])->default(value:'draft');
            $table->enum('state', ['draft', 'published'])->default('draft');
            $table->softDeletes();
            $table->foreignId(column:'user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
