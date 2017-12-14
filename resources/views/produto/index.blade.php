@extends('layouts.app')
@section('title', 'Listagem de Produtos')
@section('content')

    {{-- Campo de busca --}}
	{{ Form::open(['url' => route('produtos.buscar', ['busca' => $busca]), 'method' => 'GET']) }}
    	<div class="row">
    	<div class="col-lg-12">
    	<div class="input-group">
    		{{Form::text('busca', $busca, ['class' => 'form-control', 'required', 'placeholder' => 'O que você está procurando?'])}}
    		<span class="input-group-btn">{{Form::submit('Buscar', ['class' => 'btn btn-default'])}}</span>
    	</div>
    	</div>
    	</div>
	{{ Form::close() }}

    @if(Session::has('mensagem'))
    	<div class="alert alert-success">{{Session::get('mensagem')}}</div>
    @endif

    <br/>

    <div class="row">
	    @foreach ($produtos as $produto)
	    	<div class="col-md-3 col-sm-6 col-xs-6">
		        @if(file_exists("./img/produtos/" . $produto->foto))
		        	<a class='thumbnail' href="{{ route('produtos.show', ['id' => $produto->id]) }}">
		        	{{Html::image(asset("img/produtos/" . $produto->foto))}}
		            </a>
		        @else
		    		<a class='thumbnail' href="{{ route('produtos.show', ['id' => $produto->id]) }}">
		    		<img src="/img/produtos/SemImagem.png" class="img-responsive">
		    		</a>
		        @endif
		        <h4>{{ $produto->titulo }}</h4>

		        @if (Auth::check())
		        	<div class="text-center">
			        	{{Form::open(['route' => ['produtos.destroy', $produto->id], 'method' => 'DELETE'])}}
			        	<a class='btn btn-default' href=" {{ route('produtos.edit', ['id' => $produto->id]) }} ">Editar</a>
			        	{{Form::submit('Excluir',['class' => 'btn btn-default'])}}
			        	{{Form::close()}}
		        	</div>
		        @endif
	        </div>
	    @endforeach
	</div>

	<div class="text-center">
		{{ $produtos->appends(['busca' => $busca])->links() }}
	</div>
@endsection