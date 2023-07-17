<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Desafio CEP</title>
    <style>
        input::-webkit-outer-spin-button,
      input::-webkit-inner-spin-button {
        display: none;
      }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $("form").submit(function(e) {
        e.preventDefault();
        var cep = $("#cep").val();
        $.ajax({
          url: "https://viacep.com.br/ws/" + cep + "/json/",
          type: "GET",
          success: function(data) {
            if (data.erro) {
              $("#mensagem").html("CEP não encontrado.");
            } else {
              $("#cidade").html(data.localidade);
              $("#uf").html(data.uf);
              $("#ibge").html(data.ibge);
              $("#ddd").html(data.ddd);
              $("#mensagem").html("");
            }
          },
          error: function() {
            $("#mensagem").html("Erro ao consultar o CEP.");
          }
        });
      });
    });
  </script>
</head>

<body>
    <header class="cabeçalho">
        <img class="cabeçalho-imagem" src="/cep-logo-removebg-preview.png" alt="Logo CEP">
        <nav class="cabeçalho-menu">
                <a class="cabeçalho-menu-item">Checagem de CEP</a>
                <a class="cabeçalho-menu-item">Documentos</a>
                <a class="cabeçalho-menu-item">Exemplos</a>
        </nav>

    </header>
  <form>
   <div class="search-box">
    <input type="number" class="search-text" placeholder="Digite o CEP" id="cep">
      <button type="submit">Consultar</button>
   </div>
  </form>
   <div id="mensagem"></div>
  <p>Cidade: <span id="cidade"></span></p>
  <p>UF: <span id="uf"></span></p>
  <p>IBGE: <span id="ibge"></span></p>
  <p>DDD: <span id="ddd"></span></p>

  <footer>
    <p>Desenvolvido por @danielafuchtenbusch</p>
  </footer>
  
</body>
</html>
