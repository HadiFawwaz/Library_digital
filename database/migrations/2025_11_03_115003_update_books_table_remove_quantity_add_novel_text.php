<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('books', function (Blueprint $table) {
            // Jangan drop column di SQLite
            if (Schema::hasColumn('books', 'quantity')) {
                // Abaikan dropColumn
            }

            $table->longText('novel_text')->nullable();
        });
    }

};
