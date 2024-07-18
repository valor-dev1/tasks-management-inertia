<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->uuid()->default(DB::raw('(UUID())'));
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('assignee_id')->constrained('users');
            $table->string('title');
            $table->text('description');
            $table->enum('priority', ['low', 'normal', 'hight'])->default('low');
            $table->enum('status', ['todo', 'backlog', 'in_progress', 'in_review', 'done'])->default('todo');
            $table->date('due_date')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
