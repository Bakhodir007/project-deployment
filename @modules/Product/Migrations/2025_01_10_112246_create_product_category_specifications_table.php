<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('product_category_specifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id');
            $table->foreignId('category_specification_id');
            $table->string('value');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_category_specifications');
    }
};
