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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('company_name', 128);
            $table->string('slug', 128)->unique();
            $table->string('address', 128);
            $table->string('vat_number', 11)->unique();
            $table->string('img', 1024)->nullable();
            $table->boolean('visible')->default(1);
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants', function(Blueprint $table){
            if (Schema::hasColumn('restaurants', 'user_id')) {
                $table->dropForeign('restaurants_user_id_foreign');
                $table->dropColumn('user_id');
            };
        });

    }
};
