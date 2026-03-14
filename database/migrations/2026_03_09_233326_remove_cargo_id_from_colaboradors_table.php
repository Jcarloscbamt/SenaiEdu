<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('colaboradors', function (Blueprint $table) {
            $table->dropForeign(['cargo_id']); // remove a foreign key
            $table->dropColumn('cargo_id');    // remove a coluna
        });
    }

    public function down(): void
    {
        Schema::table('colaboradors', function (Blueprint $table) {
            $table->foreignId('cargo_id')->nullable()->constrained('cargos');
        });
    }
};