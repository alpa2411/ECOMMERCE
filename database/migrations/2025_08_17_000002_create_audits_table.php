<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasTable('audits')) {   // ✅ prevent duplicate table error
            Schema::create('audits', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained()->cascadeOnDelete();
                $table->string('session_id')->index();
                $table->timestamp('login_at')->nullable()->index();
                $table->timestamp('logout_at')->nullable()->index();
                $table->string('ip_address', 45)->nullable();
                $table->text('user_agent')->nullable();
                $table->timestamps();

                $table->index(['user_id', 'session_id']);
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('audits');
        //
    }
};
