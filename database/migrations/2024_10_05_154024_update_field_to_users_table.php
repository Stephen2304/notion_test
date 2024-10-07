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
        Schema::table('users', function (Blueprint $table) {
            // Renommer la colonne 'name' en 'firstname'
            $table->renameColumn('name', 'firstname');
            
            // Ajouter la colonne 'lastname'
            $table->string('lastname')->after('firstname');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Revenir en arrière en renommant 'firstname' en 'name'
            $table->renameColumn('firstname', 'name');
            
            // Supprimer la colonne 'lastname'
            $table->dropColumn('lastname');
        });
    }
};
