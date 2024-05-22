<?php

//Verifica se op método é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //Aqui é definido os nomes (ou credenciais) do banco de dados.
    $servername = "localhost";
    $username = "root";
    $password = "123";
    $dbname = "mydb";

    $conn = new mysqli($servername, $username, $password, $dbname); // Conexão com o banco de dados

    //Estabelece uma conexão com o banco usando o mysqli
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    //Pega os dados do formulário usando o POST.
    $nome_cliente = $_POST['nome_cliente'];
    $tipo_hamburguer = $_POST['tipo_hamburguer'];

    //É criado um SQL pra colocar os dados do pedido com a tabela "pedidos" (do SQL).
    $sql = "INSERT INTO upburguer (nome_cliente, tipo_hamburguer) VALUES ('$nome_cliente', '$tipo_hamburguer')";


    //Aqui o comando executa com um método query() da conexão com o banco de dados (Ajuda do gpt).
    if ($conn->query($sql) === TRUE) {
        echo "Pedido realizado com sucesso!"; // Se a inserção funcionar aparece uma mensagem de confirmação
    } else {
        echo "Erro ao realizar o pedido: " . $conn->error; // Se der errado aparece uma mensagem de erro.
    }

    $conn->close(); //Fecha a conexão com o banco de dados
}
?>