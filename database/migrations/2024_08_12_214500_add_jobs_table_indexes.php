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
        Schema::table('jobs', function (Blueprint $table) {
            $table->index(['queue', 'available_at', 'reserved_at'], 'jobs_queue_available_reserved_index');
            
            $table->index(['available_at'], 'jobs_available_at_index');
            
            $table->index(['reserved_at'], 'jobs_reserved_at_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropIndex('jobs_queue_available_reserved_index');
            $table->dropIndex('jobs_available_at_index');
            $table->dropIndex('jobs_reserved_at_index');
        });
    }
};
