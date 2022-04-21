<?php

// Constantes para armazenamento das variávris de conexão.

define('HOST', '127.0.0.1');
define('PORT', '3306');
define('DBNAME', 'estudo');
define('USER', 'adm');
define('PASSWORD', '8829');

// Conexão com MYSQL

try {

    $dsn = new PDO("mysql:host=". HOST . ";port=". PORT. ";dbname=". DBNAME . ";user=" . USER . ";password=" . PASSWORD);

}   catch (PDOException $e) {

    echo 'A conexão falhou e retornou a seguinte mensagem de erro: ' . $e->getMessage();

}

$CODIGO_ALUNO = 1;
$NOME = "Bruno";
$EMAIL = "br131330@gmail.com";
$DT_NASCIMENTO = "1996-09-09";

$stmt = $dsn->prepare("INSERT INTO ALUNO(NOME,  DTNASCIMENTO, EMAIL) Values (?, ?, ?)");

$resultSet = $stmt->execute([$NOME, $EMAIL, $DT_NASCIMENTO]);

if ($resultSet) {
    echo "Os dados foram inseridos com sucesso. \n\n";
}else{

echo "Ocorreu um erro e não foi possivel inserir os dados.";
exit;
}
/*
die;

$instrucaoSQL = "select id_aluno, nome_aluno, cpf_aluno, email_aluno, data_nascimento_aluno FROM ALUNO";

$resultSet = $dns->query($instrucaoSQL);

while ($row = $resultSet->fetch()) {
    echo $row ['id_aluno'] . "\t";
    echo $row ['nome_aluno'] . "\t";
    echo $row ['cpf_aluno'] . "\t";
    echo $row ['email_aluno'] . "\t";
    echo $row ['data_nascimento_aluno'] . "\t";
}

die;

$nome_aluno = "Thalita";
$cpf_aluno = "02802550326";
$email_aluno = "piquinha@gamil.com";
$data_nascimento_aluno = "1993-03-27";
$id_aluno = 2;

$stmt = $dsn->prepare("UPDATE ALUNO SET nome_aluno = ?, 
                                        cpf_aluno = ?,
                                        email_aluno = ?,
                                        data_nascimento_aluno = ?
                                        WHERE
                                        id_aluno = ? ");

$resultSet = $stmt->execute([$nome_aluno, $cpf_aluno, $email_aluno, $data_nascimento_aluno, $id_aluno]);

if ($resultSet) {
    echo "Os dados foram atualizados com sucesso. \n\n";

}else {
    echo "Ocorreu um erro e não foi possível alterar os dados";
    exit;
}

$instrucaoSQL = "Select id_aluno, nome_aluno, cpf_aluno, email_aluno, data_nascimento_aluno FROM ALUNO";

$resultSet = $dsn->query($instrucaoSql);

print_r($resultSet->fetchAll(PDO::FETCH_ASSOC));
die;

/* Deletando tabela
$id_aluno = 1;
$stmt = $dsn->prepare("DELETE FROM ALUNO WHERE is_aluno = ?");
$resultSet = $stmt->execute([$id_aluno]);

if ($resultSet) {
    echo "Os dados froam removidos com sucesso. \n\n";

}else {
    echo "Ocorreu um erro e não foi possível remover os dados.";
    exit;
}

$instrucaoSQL = "Select id_aluno, nome_aluno, cpf_aluno, email_aluno, data_nascimento_aluno FROM ALUNO";

$resultSet = $dsn->query($instrucaoSql);

print_r($resultSet->fetchAll(PDO::FETCH_ASSOC));
*/