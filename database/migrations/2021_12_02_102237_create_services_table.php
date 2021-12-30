<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('tagline')->nullable();
            $table->bigInteger('service_category_id')->unsigned()->nullable();
            $table->decimal('price')->default(0);
            $table->decimal('discount')->nullable();
            $table->enum('discount_type',['fixed','percent'])->nullable();
            $table->string('image')->nullable();
            $table->string('thumbnail')->nullable();
            $table->longText('description')->nullable();
            $table->longText('inclusion')->nullable();
            $table->longText('exclusion')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->foreign('service_category_id')->references('id')->on('service_categories')->nullOnDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
