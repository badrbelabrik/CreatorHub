<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portfolio_project_tag', function (Blueprint $table) {
            $table->foreignId('portfolio_project_id');
            $table->foreignId('tag_id');
            $table->primary(['portfolio_project_id', 'tag_id']);
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('portfolio_project_tag');
    }
};
