<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('go_links', function (Blueprint $table) {
            $table->uuid('id')->primary();
            
            $table->string('slug')->unique(); 
            
            $table->text('destination_url');
            
            $table->nullableUuidMorphs('owner'); 
            
            $table->unsignedBigInteger('click_count')->default(0);
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('go_links');
    }
};