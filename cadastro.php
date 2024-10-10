<!DOCTYPE html>

<html lang="en">
<head>
    <?php include 'Includes/header.php' ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>
</head>
<body>
    <div></div>
    <div class="container">
        <form action="Controllers/CadastroController.php" method="POST" id='formCadastro'>
            <h2>Cadastro de Cliente</h2>
            <button class="ola">Ola</button>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="sobrenome">Sobrenome:</label>
            <input type="text" id="sobrenome" name="sobrenome" required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>

            <label for="telefone">Telefone:</label>
            <input type="tel" id="telefone" name="telefone" pattern="[0-9]{2}-[0-9]{5}-[0-9]{4}" placeholder="xx-xxxxx-xxxx" required>

            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento" required>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" minlength="8" required>

            <label for="confirma_senha">Confirmar Senha:</label>
            <input type="password" id="confirma_senha" name="confirma_senha" minlength="8" required>

            <input type="submit" value="cadastrar" id="salvar">
        </form>
    </div>

    <script>
        document.getElementById('formCadastro').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Verifica se as senhas são iguais
            var senha = document.getElementById('senha').value;
            var confirmaSenha = document.getElementById('confirma_senha').value;

            if (senha !== confirmaSenha) {
                alert('As senhas não coincidem!');
                return;
            }

            var formData = new FormData(this);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'Controllers/CadastroController.php', true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    alert('Cadastro realizado com sucesso!');
                } else {
                    alert('Erro ao cadastrar: ' + xhr.statusText);
                }
            };
            xhr.onerror = function() {
                alert('Erro ao cadastrar: ' + xhr.statusText);
            };
            xhr.send(formData);
        });
    </script>
</body>
</html>
