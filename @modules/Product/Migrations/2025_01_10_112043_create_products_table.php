<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('code')->unique();
            $table->string('author_name')->nullable();
            $table->timestamp('made_at')->nullable();
            $table->foreignId('category_id')->constrained('categories');
            $table->string('description');
            $table->float('price');
            $table->string('status');
            $table->timestamp('lot_expire_at');
            $table->string('image')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
