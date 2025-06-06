<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>FMU - CRUD</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Segoe UI", sans-serif;
    }

    body {
      background-color: #1c0033;
      color: #fff;
      padding: 2rem;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 2rem;
    }

    h1 {
      font-size: 1.8rem;
      font-weight: bold;
    }

    .profile-icon {
      background-color: white;
      cursor: pointer;
      color: #1c0033;
      border-radius: 50%;
      padding: 0.6rem;
      font-size: 1.2rem;
    }

    .simulacao-btn a {
      display: block;
      background-color: #00a000;
      color: white;
      text-align: center;
      padding: 1rem;
      border-radius: 10px;
      font-weight: 500;
      margin-bottom: 1rem;
      text-decoration: none;
      transition: background-color 0.3s;
    }

    .simulacao-btn a:hover {
      background-color: #008000;
    }

    .search-bar {
      display: flex;
      gap: 1rem;
      margin-bottom: 2rem;
    }

    .search-bar input {
      flex: 1;
      padding: 0.8rem 1rem;
      border: none;
      border-radius: 10px;
      font-size: 1rem;
      outline: none;
    }

    .filter-btn {
      padding: 0.8rem 1rem;
      border: none;
      border-radius: 10px;
      background-color: #eee;
      color: #444;
      font-weight: 500;
      cursor: pointer;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background-color: #f5f5f5;
      border-radius: 1rem;
      overflow: hidden;
      color: #333;
    }

    .profile-container {
      position: relative;
      display: inline-block;
    }

    .profile-info {
      display: none;
      position: absolute;
      top: 140%;
      right: 0;
      background-color: white;
      color: #1c0033;
      padding: 0.8rem 1rem;
      border-radius: 10px;
      box-shadow: 0 0 8px rgba(0,0,0,0.2);
      font-size: 0.9rem;
      white-space: nowrap;
      z-index: 10;
    }

    .profile-container:hover .profile-info {
      display: block;
    }


    th, td {
      padding: 1rem;
      text-align: left;
      border-bottom: 1px solid #ccc;
    }

    thead {
      background-color: #eaeaea;
    }

    .options {
      cursor: pointer;
      font-size: 1.5rem;
      position: relative;
    }

    .crud-menu {
      display: none;
      position: absolute;
      top: 30px;
      right: 0;
      background-color: white;
      color: #1c0033;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-shadow: 0 0 5px rgba(0,0,0,0.3);
      z-index: 100;
    }

    .crud-menu button {
      display: block;
      padding: 0.5rem 1rem;
      width: 100%;
      background: none;
      border: none;
      text-align: left;
      cursor: pointer;
      font-size: 0.9rem;
    }

    .crud-menu button:hover {
      background-color: #eee;
    }

    .action-button {
    padding: 0.5rem 1rem;
    border: none;
    border-radius: 5px;
    font-weight: 500;
    cursor: pointer;
    font-size: 0.9rem;
    transition: background-color 0.3s;
    }

    .edit-button {
      background-color: #ffc107;
      color: #1c0033;
      margin-right: 0.5rem;
    }

    .edit-button:hover {
      background-color: #e0a800;
    }

    .delete-button {
      background-color: #dc3545;
      color: white;
    }

    .delete-button:hover {
      background-color: #c82333;    
    }

    .action-cell {
      text-align: right;
    }

    .action-cell > * {
      display: inline-block;
      margin-left: 0.5rem;
    }

    .profile-container {
      position: relative;
      display: inline-block;
    }

    .profile-dropdown {
      display: none;
      position: absolute;
      top: 110%;
      right: 0;
      background-color: #fff;
      color: #1c0033;
      border: 1px solid #ccc;
      border-radius: 8px;
      padding: 1rem;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
      min-width: 200px;
      z-index: 999;
    }

    .profile-container:hover .profile-dropdown {
      display: block;
    }

    .logout-button {
      margin-top: 1rem;
      padding: 0.5rem 1rem;
      background-color: #dc3545;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      width: 100%;
      font-size: 0.9rem;
      transition: background-color 0.3s;
    }

    .logout-button:hover {
      background-color: #c82333;
    }


  </style>
</head>
<body>
  @if(session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
  @endif

  <header>
    <h1>FMU</h1>
    <div class="profile-container">
      <div class="profile-icon">👤</div>
        <div class="profile-dropdown">
          <p><strong>{{ Auth::user()->name }}</strong></p>
          <p>{{ Auth::user()->email }}</p>
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-button">Desconectar</button>
          </form>
        </div>
      </div>
    </div>
  </header>

  <div class="simulacao-btn">
    <a href="{{ route('simulador.bemvindo') }}">Faça uma simulação agora!</a>
  </div>


  <table>
    <thead>
      <tr>
        <th>Data</th>
        <th>Hora</th>
        <th>Tipo de Renda</th>
        <th>Valor Recebido</th>
        <th>Valor Final</th>
        <th></th>
      </tr>
    </thead>
    <tbody id="table-body">
      @forelse($simulacoes as $simulacao)
        <tr>
          <td>{{ \Carbon\Carbon::parse($simulacao->created_at)->format('d/m/y') }}</td>
          <td>{{ \Carbon\Carbon::parse($simulacao->created_at)->format('H:i') }}hs</td>
          <td>{{ $simulacao->renda->tipo ?? 'N/A' }}</td>
          <td>R$ {{ number_format($simulacao->renda->valor ?? 0, 2, ',', '.') }}</td>
          <td>R$ {{ number_format($simulacao->valor_final ?? 0, 2, ',', '.') }}</td>
          <td class="action-cell">
            <a href="{{ route('simulacao.editar', $simulacao->id) }}" class="action-button edit-button">Editar</a>

            <form method="POST" action="{{ route('simulacao.destroy', $simulacao->id) }}" class="delete-form" onsubmit="return confirmDelete()">
              @csrf
              @method('DELETE')
              <button type="submit" class="action-button delete-button">Excluir</button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="6" style="text-align: center;">Nenhuma simulação encontrada.</td>
        </tr>
      @endforelse
    </tbody>
  </table>

  <script>
    function confirmDelete() {
      return confirm('Tem certeza que deseja excluir esta simulação? Essa ação não pode ser desfeita.');
    }
  </script>
</body>
</html>
