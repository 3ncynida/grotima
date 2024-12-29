<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah_stok');
            $table->integer('stok_terambil')->nullable();
            $table->timestamps();
        });
        Schema::create('data', function (Blueprint $table) {
            $table->id('data_id');
            $table->enum('marketplace', ['Lazada', 'Shopee', 'Tokopedia']);
            $table->enum('ekspedisi', ['Ninja', 'JNT']);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key
            $table->foreignId('stok_id')->constrained('stok')->onDelete('cascade'); // Foreign key
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
        Schema::dropIfExists('data');
        Schema::dropIfExists('stok');
    }
}
