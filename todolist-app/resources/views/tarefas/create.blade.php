@extends('layouts.app')

@section('title', 'Adicionar Tarefas')

@section('content')
    <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md mt-10 mb-20">

        <h2 class="text-3xl font-bold text-gray-800 mb-6">Cadastre uma Nova Tarefa</h2>

        <form action="{{ route('tarefas.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="nome" class="block text-sm font-medium text-gray-700">
                    Nome:
                </label>
                <input type="text" id="nome" name="nome" value="{{ old('nome') }}"
                       placeholder="Informe o nome da tarefa..." required
                       class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                @error('nome')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="descricao" class="block text-sm font-medium text-gray-700">
                    Descrição:
                </label>
                <input type="text" id="descricao" name="descricao" value="{{ old('descricao') }}"
                       placeholder="Informe a descrição da tarefa..."
                       class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                @error('descricao')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">
                    Status:
                </label>
                <select id="status" name="status" required
                        class="block w-full mt-1 px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option value="Não iniciada" @if(old('status', 'Não iniciada') == 'Não iniciada') selected @endif>Não iniciada</option>
                    <option value="Em andamento" @if(old('status') == 'Em andamento') selected @endif>Em andamento</option>
                    <option value="Concluída" @if(old('status') == 'Concluída') selected @endif>Concluída</option>
                </select>
                @error('status')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end gap-4 pt-4">
                <a href="{{ route('tarefas.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg shadow-md">
                    Cancelar
                </a>
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg shadow-md">
                    Cadastrar
                </button>
            </div>
        </form>
    </div>
@endsection
