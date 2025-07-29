<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
{
    Schema::create('courses', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description')->nullable();
        $table->decimal('price', 8, 2)->default(0.00);
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
