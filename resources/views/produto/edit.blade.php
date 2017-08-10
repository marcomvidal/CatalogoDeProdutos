@extends('layouts.app')
@section('title', 'Alterar o produto: '. $produto->titulo)
@section('content')
	<h1>Alterar o produto: {{$produto->titulo}}</h1>

	<!-- Resposta de erro de validação de formulário -->
	@if(count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
			</ul>
		</div>
	@endif

	<!-- Resposta de sucesso da modificação do formulário -->
	@if(Session::has('mensagem'))
		<div class="alert alert-success">
			{{Session::get('mensagem')}}
		</div>
	@endif

	<div class="row">
		<!-- Informações e campos do formulário -->
		<div class="col-md-8">
			{{Form::open(['route'=>['produtos.update',$produto->id],'enctype'=>'multipart/form-data','method'=>'PUT'])}}
			{{Form::label('referencia','Referência',['class'=>'prettyLabels'])}}
			{{Form::text('referencia',$produto->referencia,['class' => 'form-control','required', 'placeholder' => 'Referência'])}}
			{{Form::label('titulo', 'Título')}}
			{{Form::text('titulo',$produto->titulo,['class' => 'form-control','required', 'placeholder' => 'Título'])}}
			{{Form::label('descricao', 'Descrição')}}
			{{Form::textarea('descricao',$produto->descricao,['rows'=>3,'class'=>'form-control','required','placeholder'=>'Descrição'])}}
			{{Form::label('preco', 'Preço')}}
			{{Form::text('preco',$produto->preco,['class'=>'form-control','required','placeholder'=>'Preço'])}}
			{{Form::label('fotoproduto', 'Foto')}}
			{{Form::file('fotoproduto',['class' => 'form-control','id'=>'fotoproduto'])}}
			<br/>
			{{Form::submit('Alterar',['class'=>'btn btn-default'])}}
			{{Form::close()}}
		</div>
		<!-- Exibição da imagem do produto, se houver -->
		<div class="col-md-4">
			@if(file_exists("./img/produtos/" . "$produto->foto"))
		    	<a href="{{ url('produtos/'."$produto->id") }}">
		    		<img src="/img/produtos/{{$produto->foto}}" class="img-responsive">
		    	</a>
		    @else
		    	<img src="/img/produtos/SemImagem.png" class="img-responsive">
		    @endif
		</div>

		<!-- Adequação do campo monetário -->
		{{Html::script('js/jquery.maskMoney.min.js')}}
    
    	<script type="text/javascript">
        	$(document).ready(function(){
              	$("#preco").maskMoney({decimal:",", thousands:"."});
        	})
    	</script>
	</div>
@endsection