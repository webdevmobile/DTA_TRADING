<?php

use App\Models\User;
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
        Schema::create('trades', function (Blueprint $table) {
            $table->id();
            $table->string('symbol');
            $table->string('type');
            $table->float('entry_point');
            $table->float('exit_sl');
            $table->float('exit_tp');
            $table->longText('raison_ent');
            $table->longText('raison_exit');
            $table->string('result');
            $table->double('montant');
            $table->float('lot_size');
            $table->string('image')->nullable();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trades');
    }
};
