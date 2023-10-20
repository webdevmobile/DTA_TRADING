<?php

use App\Models\Session;
use App\Models\Training;
use App\Models\User;
use App\Models\UserTraining;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->foreignIdFor(Session::class)->nullable()->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
        Schema::create('training_user', function (Blueprint $table) {
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Training::class)->constrained()->cascadeOnDelete();
            $table->primary(['training_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainings');
        Schema::dropIfExists('user_training');
    }
};
