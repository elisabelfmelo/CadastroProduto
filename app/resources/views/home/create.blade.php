@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h3>Novo Produto</h3>
        @include('cadastro._form')
        <div class="form-group">
            <input type="submit" name="save_eqp" value="Salvar produto">
            <input type="submit" name="cancel" value="Cancelar">
        </div>
    </div>
    </form>
</div>
@endsection
