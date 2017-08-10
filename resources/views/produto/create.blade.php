@extends('layouts.app')
@section('title', 'Adicionar um produto')
@section('content')
	<h1>Criar um novo produto</h1>

	<!-- Respostas de erro de validação de formulário -->
	@if(count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
			</ul>
		</div>
	@endif

	<!-- Informações e campos do formulário -->
	{{Form::open(['action' => 'ProdutosController@store','enctype'=>'multipart/form-data'])}}
	{{Form::label('referencia', 'Referência')}}
	{{Form::text('referencia', '',['class'=>'form-control','required','placeholder'=>'Referência'])}}
	{{Form::label('titulo', 'Título')}}
	{{Form::text('titulo', '', ['class'=>'form-control','required','placeholder'=>'Título'])}}
	{{Form::label('descricao', 'Descrição')}}
	{{Form::textarea('descricao','',['rows'=>3,'class'=>'form-control','required','placeholder'=>'Descrição'])}}
	{{Form::label('preco', 'Preço')}}
	{{Form::text('preco','',['class'=>'form-control','required','placeholder'=>'Preço'])}}
	{{Form::label('fotoproduto', 'Foto')}}
	{{Form::file('fotoproduto',['class' => 'form-control','id'=>'fotoproduto'])}}
	<br/>
	{{Form::submit('Cadastrar',['class'=>'btn btn-default'])}}
	{{Form::close()}}

	<!-- Adequação do campo monetário -->
	{{Html::script('js/jquery.maskMoney.min.js')}}
    
    <script type="text/javascript">
        $(document).ready(function(){
            $("#preco").maskMoney({decimal:",", thousands:"."});
        });
    </script>
@endsection