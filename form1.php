<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-4">Formulário de Contato</h1>
    <form action="sendMail.php?layout=<?= $layout ?>" method="post" <?= ($embed ?? null) ? 'target="_blank"' : '' ?>>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required class="border border-gray-400 p-2 w-full">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="telefone">Telefone:</label>
            <input type="tel" id="telefone" name="telefone" class="border border-gray-400 p-2 w-full">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="email">Email:</label>
            <input type="email" id="email" name="email" required class="border border-gray-400 p-2 w-full">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="assunto">Assunto:</label>
            <input type="text" id="assunto" name="assunto" required class="border border-gray-400 p-2 w-full">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="mensagem">Mensagem:</label>
            <textarea id="mensagem" name="mensagem" required class="border border-gray-400 p-2 w-full h-32"></textarea>
        </div>
        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Enviar</button>
        </div>
    </form>
</div>
