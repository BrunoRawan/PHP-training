<?php
2 /***CONEXÃO COM O BD ***/
3 //O código de validação server side pode ser visto no exemplo de código 3.
4 //Constantes para armazenamento das variáveis de conexão.
5 define('HOST', '192.168.52.128');
6 define('PORT', '5432');
7 define('DBNAME', 'minimundo');
8 define('USER', 'postgres');
9 define('PASSWORD', '159753');
10 try {
11 $dsn = new PDO("pgsql:host=". HOST . ";port=".PORT.";dbname=" . DBNAME .
";user=" . USER . ";password=" . PASSWORD);
12 } catch (PDOException $e) {
13 echo 'A conexão falhou e retorno a seguinte mensagem de erro: ' .
$e->getMessage();
14 }
15 /***PREPARAÇÃO E INSERÇÃO NO BANCO DE DADOS ***/
16 $instrucaoSQL = "Select id_cliente, nome_cliente, cpf_cliente, email_cliente,
data_nascimento_cliente From cliente";
17 $resultSet = $dsn->query($instrucaoSQL);
18 ?>
19 <!DOCTYPE html>
20 <html>
21 <head>
22 <title>Formulário HTML - Cadastro de Clientes</title>
23 <meta charset="utf-8">
24 <meta http-equiv="X-UA-Compatible" content="IE=edge">
25 <meta name="viewport" content="width=device-width, initial-scale=1.0">
26 <!-- Bootstrap -->
27 <link
href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
rel="stylesheet" />
28 </head>
29 <body>
30 <div class="container">
31 <div class="row">
32 <div class="col-md-12">
33 <div class="row">
34 <div class="col-md-8">
35 <div class="card">
36 <div class="card-header">
37 <h3>Listagem de Clientes</h3>
38 </div>
39 <div class="card-body">
40 <table class="table">
41 <thead class="thead-dark">
42 <tr>
43 <th scope="col">#</th>
44 <th scope="col">Nome</th>
45 <th scope="col">CPF</th>
46 <th scope="col">E-mail</th>
47 <th scope="col">Data de Nascimento</th>
48 </tr>
49 </thead> <tbody>
 <?php
 while ($row = $resultSet->fetch(PDO::FETCH_ASSOC)):
 ?>
 <tr>
 <th scope="row"><?php echo $row['id_cliente']; ?></th>
 <td><?php echo $row['nome_cliente']; ?></td>
 <td><?php echo preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4",
$row['cpf_cliente']); ?></td>
 <td><?php echo $row['email_cliente']; ?></td>
 <td><?php echo date('d/m/Y', strtotime($row['data_nascimento_cliente'])); ?></td>
 </tr>
 <?php
62 endwhile;
63 ?>
 </tbody>
 </table>
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 <script
src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></scr
ipt>
 </body>
</html>