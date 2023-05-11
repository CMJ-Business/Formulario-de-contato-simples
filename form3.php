<?php
$setores = array_keys((array) config('setores', []));
?>
<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-4">Formulário de Contato</h1>
    <form action="sendMail.php?layout=<?= $layout ?>" method="post" <?= ($embed ?? null) ? 'target="_blank"' : '' ?>>
        <div class="flex flex-wrap mx-3 mb-6">
            <div class="w-full px-3 mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nome">
                    Nome
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="nome" name="nome" type="text" placeholder="Nome" required>
            </div>
        </div>

        <!--
    <div class="flex flex-wrap mx-3 mb-6">
        <div class="w-full px-3 mb-6">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="campo">
                Nome
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="campo" name="campo" required type="text" placeholder="Nome">
            <p class="text-red-500 text-xs italic">Mensagem de erro de exemplo.</p>
        </div>
    </div>
    -->

        <div class="flex flex-wrap mx-3 mb-6">
            <div class="w-full px-3 mb-6">
                <label class=" block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                    E-mail
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="email" name="email" type="email" placeholder="E-mail" required>
            </div>
        </div>

        <div class="flex flex-wrap mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="assunto">
                    Assunto
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="assunto" name="assunto" type="text" placeholder="Assunto" required>
            </div>
        </div>

        <?php if ($setores) : ?>
            <div class="flex flex-wrap mx-3 mb-6">
                <div class="w-full px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="setor">
                        Setor
                    </label>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="setor" name="setor">
                            <option value="">Selecione um setor</option>
                            <?php foreach ($setores as $setor) : ?>
                                <option value="<?= $setor ?>"><?= strtoupper($setor) ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>

        <div class="flex flex-wrap mx-3 mb-6">
            <div class="w-full px-3 mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="telefone">
                    Telefone
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="telefone" name="telefone" type="text" placeholder="(41) 98888-88888">
            </div>
        </div>

        <div class="flex flex-wrap mx-3 mb-6">
            <div class="w-full px-3 mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="mensagem">
                    Mensagem
                </label>
                <textarea id="mensagem" name="mensagem" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Sua mensagem aqui"></textarea>
            </div>
        </div>

        <div class="flex flex-wrap mx-3 mb-6">
            <div class="w-full px-3 mb-6">
                <button type="submit" class="px-4 py-2 font-semibold text-sm bg-green-500 text-white rounded-full shadow-sm">
                    Enviar
                </button>
            </div>
        </div>
    </form>
</div>
