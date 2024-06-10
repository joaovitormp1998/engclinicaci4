<style>
    .custom-green {
        background-color: #00997d;
    }

    .custom-green-hover:hover {
        background-color: #007b63;
        /* Ajuste o tom para o hover */
    }
</style>
<div class="content-wrapper px-4">
    <h1 class="text-3xl mb-4 text-teal-600 text-left">Cadastro de Usuários</h1>
    <div class="flex items-center justify-between mb-4">
        <!-- Modal toggle -->
        <button class="block text-white custom-green custom-green-hover focus:ring-4 focus:ring-blue-900 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button" data-modal-toggle="modalcadastrousuario">
            Novo Usuario
        </button>
        <ol class="breadcrumb bg-white rounded p-2 shadow ml-auto">
            <li class="breadcrumb-item"><a href="<?= base_url('/home') ?>">Home</a></li>
            <li class="breadcrumb-item active">Usuários</li>
        </ol>
    </div>

    <?php include "tabela_usuarios.php" ?>

    <!-- Modal -->
    <div id="modalcadastrousuario" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 overflow-x-hidden overflow-y-auto h-modal md:h-full">
        <div class="relative w-full h-full max-w-md md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="modalcadastrousuario">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 011.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-custom-green dark:text-custom-green">Cadastrar Usuário</h3>
                    <!-- No seu formulário de visualização -->


                    <div id="mensagem-container" class="hidden" role="alert">
                        <div id="mensagem-texto" class="bg-red-500 text-white font-bold rounded-t px-4 py-2"></div>
                        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                            <ul id="erros-validacao" class="hidden"></ul>
                        </div>
                    </div>


                    <form class="space-y-6" method="post" enctype="multipart/form-data">
                        <div>
                            <input id="uid" type="hidden" name="uid" value="">
                            <label for="nome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Nome</label>
                            <input type="text" name="nome" id="nome" class="bg-gray-50 border border-gray-900 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                        </div>
                        <div>
                            <label for="nivel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Nível</label>
                            <select name="nivel" id="nivel" class="bg-gray-50 border border-gray-900 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                                <option value="A">Administrador</option>
                                <option value="F">Funcionario</option>
                            </select>
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-900 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                        </div>
                        <div>
                            <label for="senha" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Senha</label>
                            <input type="password" name="senha" id="senha" class="bg-gray-50 border border-gray-900 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                        </div>
                        <div>
                            <label for="repita_senha" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Repetir Senha</label>
                            <input type="password" name="repita_senha" id="repita_senha" class="bg-gray-50 border border-gray-900 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                        </div>
                        <div>
                            <label for="foto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Foto</label>
                            <input type="file" name="foto" id="foto" class="bg-gray-50 border border-gray-900 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                        </div>
                        <button type="submit" class="w-full text-white custom-green custom-green-hover focus:ring-4 focus:outline-none focus:ring-primary-900 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.querySelector('form').addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(this);

        console.log("Enviando dados do formulário:", formData);

        fetch('<?= base_url('/usuario/create') ?>', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                console.log("Resposta do servidor:", response);
                if (!response.ok) {
                    throw new Error(`Erro na requisição: ${response.status} ${response.statusText}`);
                }
                return response.json();
            })
            .then(data => {
                console.log("Dados recebidos do servidor:", data);

                const mensagemContainer = document.getElementById('mensagem-container');
                const mensagemTexto = document.getElementById('mensagem-texto');
                const errosValidacao = document.getElementById('erros-validacao');

                mensagemContainer.classList.remove('hidden', 'alert-success', 'alert-danger'); // Limpa classes anteriores

                // Remove classes de background anteriores
                mensagemContainer.classList.remove('bg-red-500', 'bg-green-500');
                mensagemTexto.classList.remove('bg-red-100', 'bg-green-100');

                if (data.tipo === 'success') {
                    mensagemTexto.textContent = data.mensagem;
                    mensagemContainer.classList.add('bg-green-500');
                    mensagemTexto.classList.add('bg-green-100')
                    errosValidacao.classList.add('hidden');
                    // Limpar o formulário após o sucesso (opcional)
                    this.reset();
                } else {
                    mensagemContainer.classList.add('bg-red-500');
                    mensagemTexto.classList.add('bg-red-100');
                    const mensagensErro = {
                        'required': 'O campo {campo} é obrigatório.',
                        'valid_email': 'O campo E-mail deve conter um endereço de e-mail válido.',
                        'unique': 'Este e-mail já está cadastrado.' // Simplifiquei para 'unique'
                    };


                    if (data.errors) {
                        errosValidacao.innerHTML = '';
                        mensagemTexto.innerHTML = data.mensagem;

                        let primeiroItem = data.errors;
                        console.log(primeiroItem);

                        for (const campo in primeiroItem) {
                            const erroItem = document.createElement('li');
                            const mensagemOriginal = data.errors[campo];

                            // Extrai a parte relevante da mensagem (após "The ... field")
                            const parteRelevante = mensagemOriginal.replace(/^The\s+\w+\s+field\s+/, '');
                            // Procura por correspondências aproximadas nas traduções
                            let mensagemTraduzida = null;
                            for (const tipoErro in mensagensErro) {
                                if (parteRelevante.match(new RegExp(tipoErro, 'i'))) { // 'i' para ignorar maiúsculas/minúsculas
                                    mensagemTraduzida = mensagensErro[tipoErro].replace('{campo}', campo);
                                    break;
                                }
                            }
                            // Se não encontrou correspondência, usa a mensagem original
                            erroItem.textContent = mensagemTraduzida || mensagemOriginal;
                            errosValidacao.appendChild(erroItem);
                        }

                        errosValidacao.classList.remove('hidden');
                        mensagemContainer.classList.add('alert-danger');
                    } else {
                        // Exibe mensagem de erro geral se não houver erros específicos
                        mensagemTexto.textContent = data.mensagem || 'Erro desconhecido. Entre em contato com o suporte.';
                        mensagemContainer.classList.add('alert-danger');
                    }
                }

                // Ocultar a mensagem após 5 segundos (opcional)
                // setTimeout(() => {
                //     mensagemContainer.classList.add('hidden');
                // }, 5000);
            })
            .catch(error => {
                console.error("Erro durante a requisição:", error);
                const mensagemContainer = document.getElementById('mensagem-container');
                mensagemContainer.textContent = 'Erro ao processar a requisição. Tente novamente mais tarde.';
                mensagemContainer.classList.remove('hidden', 'alert-success');
                mensagemContainer.classList.add('alert-danger');

                // Ocultar a mensagem após 5 segundos (opcional)
                setTimeout(() => {
                    mensagemContainer.classList.add('hidden');
                }, 5000);
            });
    });
</script>

<script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>