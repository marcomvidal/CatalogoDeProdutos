@extends('layouts.app')
@section('title', $produto->titulo)
@section('content')
    
    <div class="row">
	    <div class="col-md-7">
	    	<h1>{{ $produto->titulo }}</h1>
		    <ul>
		        <li><strong>Referência:</strong> {{ $produto->referencia }}</li>
		        <li><strong>Preço:</strong> R$ {{ number_format($produto->preco,2,',','.')}}</li>
		        <li><strong>Adicionado em:</strong> {{ date("d/m/Y", strtotime($produto->created_at)) }}</li>
		    </ul>
		    <p><strong>Descrição:</strong></p>
		    <p>{{ $produto->descricao }}</p>
		    <a href="javascript:history.go(-1)"><button class="btn btn-default">Voltar</button></a>
	    </div>

	    <!-- Carregamento da imagem do produto, se houver -->
	    <div class="col-md-5">
			@if(file_exists("./img/produtos/" . "$produto->foto"))
		    	<a href="{{ url('produtos/'.$produto->id) }}">
		    		<img src="/img/produtos/{{ $produto->foto }}" class="img-responsive">
		    	</a>
		    @else
		    	<a href="{{ url('produtos/'.$produto->id) }}">
		    		<img src="/img/produtos/SemImagem.png" class="img-responsive">
		    	</a>
		    @endif
		</div>
    </div>

    
@endsection