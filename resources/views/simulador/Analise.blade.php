<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Análise de Gastos</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #1E0034;
      background-size: cover;
      background-repeat: no-repeat;
      color: #1E0034;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .container {
      background-color: rgba(255, 255, 255, 0.9);
      padding: 30px 40px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
      max-width: 500px;
      text-align: center;
    }

    h1 {
      font-size: 28px;
      color: #633BBC;
      margin-bottom: 10px;
    }

    .descricao {
      font-size: 16px;
      color: #444;
      margin-bottom: 25px;
    }

    .dados p {
      font-size: 18px;
      margin: 12px 0;
      display: flex;
      justify-content: space-between;
      border-bottom: 1px solid #ddd;
      padding-bottom: 5px;
    }

    .categoria {
      font-weight: bold;
      color: #D06833;
    }

    .porcentagem {
      color: #1E0034;
    }

    .botao {
      display: inline-block;
      margin-top: 30px;
      padding: 10px 25px;
      background-color: #633BBC;
      color: #fff;
      text-decoration: none;
      border-radius: 8px;
      font-size: 20px;
      transition: background-color 0.3s ease;
    }

    .botao:hover {
      background-color: #5129a4;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>ANÁLISE FINAL</h1>
    <p class="descricao">Veja como seus gastos foram analisados com base na sua renda.</p>
    <div class="dados">
      <p><span class="categoria">Essenciais:</span> <span class="porcentagem" id="valor-essenciais">{{ $porcentagens['essenciais'] }}%</span></p>
      <p><span class="categoria">Lazer:</span> <span class="porcentagem" id="valor-lazer">{{ $porcentagens['lazer'] }}%</span></p>
      <p><span class="categoria">Investimento e Outros:</span> <span class="porcentagem" id="valor-investimento">{{ $porcentagens['investimento'] }}%</span></p>
    </div>
    <a href="{{ route('simulador.finalizar') }}" class="botao">FINALIZAR</a>
  </div>
</body>
</html>
