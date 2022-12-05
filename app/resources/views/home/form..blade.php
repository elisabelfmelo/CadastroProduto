<form action={{route('cadastro.store')}} method="post">
    @csrf
    <input type="hidden" id="redirect_to" name="redirect_to" value={{URL::previous()}}>
    <div>
        <label for="id">ID</label>
        <input type="number" id="id" name="id">
    </div>
    <div>
        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome">
    </div>
    <div>
        <label for="preco">Preço</label>
        <input type="number" id="preco" name="preco">
    </div>
