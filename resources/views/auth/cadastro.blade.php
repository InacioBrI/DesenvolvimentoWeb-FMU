<!-- resources/views/auth/cadastro.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Cadastro</title>
  <link rel="stylesheet" href="/Pages/styles.css"/>
  <style>
  
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', sans-serif;
    }
    
    body.container {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #1a0033;
        height: 100vh;
        color: #fff;
    }
    
    .login-box, .cadastro-box {
        background: white;
        padding: 40px;
        border-radius: 8px;
        width: 500px;
        color: #000000;
        display: flex;
        flex-direction: column;
        gap: 15px;
    }
    
    .login-box h1, .cadastro-box h1 {
        font-size: 2rem;
        color: #000000;
        text-align: left;
        margin-bottom: 20px;
    }
    
    input[type="email"],
    input[type="password"],
    input[type="text"] {
        width: 100%;
        padding: 10px;
        margin-top: 4px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    
    button {
        background-color: #6937d9;
        width: 100%;
        color: white;
        padding: 12px;
        border: none;
        border-radius: 6px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
        margin-top: 10px;
    }
    
    button:hover {
        background-color: #5428b9;
    }
    
    .cadastro-link {
        font-size: 0.85rem;
        color: #3b3bf3;
        text-decoration: none;
        margin-top: 10px;
        display: inline-block;
    }
    
    .imagem {
        margin-left: 50px;
    }
    
    .imagem img {
        width: 500px;
    }
    
    body.cadastro {
        justify-content: center;
    }
    
    .button-link {
        display: inline-block;
        background-color: #6937d9;
        color: white;
        padding: 12px;
        border-radius: 6px;
        font-weight: bold;
        text-align: center;
        text-decoration: none;
        width: 100%;
    }
    .button-link:hover {
        background-color: #5428b9;
    }
  
  </style>

</head>
<body class="container cadastro">
  <div class="cadastro-box">
    <h1>CRIE SEU CADASTRO</h1>

    <form method="POST" action="{{ route('cadastro.submit') }}">
        @csrf

        <label for="nome">Nome</label>
        <input type="text" name="name" id="nome" placeholder="Digite seu nome" required />

        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Digite seu e-mail" required />

        <label for="senha">Senha</label>
        <input type="password" name="password" id="senha" placeholder="Digite sua senha" required />

        <button type="submit">CONTINUAR</button>
    </form>

  </div>
</body>
</html>
