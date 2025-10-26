public function up(): void
{
    Schema::create('professores', function (Blueprint $table) {
        $table->id();
        $table->string('nome');
        $table->string('cpf');
        $table->string('email')->unique();
        $table->string('telefone')->nullable();
        $table->date('data_nascimento')->nullable();
        $table->foreignId('cargo_id')->constrained('cargos')->onDelete('cascade');
        $table->timestamps();
    });
}
