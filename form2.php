<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-4">Formulário de Contato</h1>
    <form action="sendMail.php?layout=<?= $layout ?>" method="post" <?= ($embed ?? null) ? 'target="_blank"' : '' ?>>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="nome">
                Nome
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nome" name="nome" type="text" placeholder="Seu nome">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="telefone">
                Telefone
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="telefone" name="telefone" type="text" placeholder="Seu telefone">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="email">
                E-mail
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" placeholder="Seu e-mail">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="assunto">
                Assunto
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="assunto" name="assunto" type="text" placeholder="Assunto da mensagem">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="mensagem">
                Mensagem
            </label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="mensagem" name="mensagem" rows="6" placeholder="Sua mensagem"></textarea>
        </div>
        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Enviar
            </button>
        </div>
    </form>
</div>
