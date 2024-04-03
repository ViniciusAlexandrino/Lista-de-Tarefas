<!DOCTYPE html>
<html>
<head>
    <title>Lista de Tarefas</title>
</head>
<body>
    <h2>Lista de Tarefas</h2>

    <form method="post">
        <input type="text" name="tarefa" placeholder="Digite uma nova tarefa" required>
        <button type="submit" name="adicionar">Adicionar</button>
    </form>

    <?php
    // Verifica se o formulário foi enviado
    if (isset($_POST['adicionar'])) {
        // Verifica se o campo da tarefa não está vazio
        if (!empty($_POST['tarefa'])) {
            // Adiciona a tarefa ao array de tarefas
            $tarefa = $_POST['tarefa'];
            $tarefas[] = $tarefa;

            // Salva a lista de tarefas no arquivo tasks.txt
            file_put_contents('tasks.txt', implode("\n", $tarefas));

            // Exibe a mensagem de sucesso
            echo "<p>Tarefa adicionada com sucesso!</p>";
        } else {
            // Exibe uma mensagem de erro se o campo estiver vazio
            echo "<p>Por favor, insira uma tarefa válida.</p>";
        }
    }

    // Verifica se o arquivo tasks.txt existe
    if (file_exists('tasks.txt')) {
        // Lê o conteúdo do arquivo tasks.txt e exibe as tarefas
        $tarefas = file('tasks.txt', FILE_IGNORE_NEW_LINES);
        if (!empty($tarefas)) {
            echo "<ul>";
            foreach ($tarefas as $tarefa) {
                echo "<li>$tarefa</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>Nenhuma tarefa encontrada.</p>";
        }
    } else {
        // Exibe uma mensagem se o arquivo não existir
        echo "<p>Nenhuma tarefa encontrada.</p>";
    }
    ?>
</body>
</html>
