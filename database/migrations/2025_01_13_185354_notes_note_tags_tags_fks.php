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
        Schema::table('note_tags', function (Blueprint $table) {
            $table->foreign('note_id')
                ->references('id')
                ->on('notes');
        });
        Schema::table('note_tags', function (Blueprint $table) {
            $table->foreign('tag_id')
                ->references('id')
                ->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('note_tags', function (Blueprint $table) {
            $table->dropForeign('note_tags_notes_id_foreign');
        });
        Schema::table('note_tags', function (Blueprint $table) {
            $table->dropForeign('note_tags_tags_id_foreign');
        });
    }
};
