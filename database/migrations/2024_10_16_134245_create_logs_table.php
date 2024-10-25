<?php


use App\Models\LogLevel;
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
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->text('message')->nullable();
            $table->json('context')->nullable();
            $table->unsignedBigInteger('loggable_id')->nullable();
            $table->string('loggable_type')->nullable();
            $table->foreignIdFor(LogLevel::class, 'level_id')->constrained('log_levels');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};
