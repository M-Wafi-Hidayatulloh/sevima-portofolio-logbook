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
        $table->string('username')->unique()->after('name')->nullable(); // URL unik portofolio (/p/{username})
        $table->string('school_name')->after('email')->nullable();       // Nama Sekolah / Instansi
        $table->text('bio')->after('school_name')->nullable();           // Ringkasan profil / keahlian
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['username', 'school_name', 'bio']);
        });
    }
};
