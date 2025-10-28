# 🚀 Organizador de Tarefas - Desafio Laravel

Este projeto é uma aplicação web completa para gerenciamento de tarefas (To-Do List) construída com Laravel. Ela implementa um sistema CRUD completo, autenticação de usuários, funcionalidade de "lixeira" (Soft Deletes) e filtragem dinâmica de tarefas.

O frontend foi desenvolvido utilizando **Tailwind CSS** para um design moderno e responsivo.

## ✨ Funcionalidades Principais

* **Autenticação de Usuários:** Sistema completo de Login e Registro. As rotas são protegidas, permitindo que apenas usuários autenticados gerenciem suas tarefas.
* **CRUD Completo de Tarefas:**
    * **Create:** Criar novas tarefas com nome, descrição e status.
    * **Read:** Listar todas as tarefas com paginação e filtros.
    * **Update:** Editar tarefas existentes.
    * **Delete:** Mover tarefas para a lixeira (Soft Delete).
* **Lixeira (Soft Deletes):** Tarefas "excluídas" não são removidas permanentemente. Elas vão para uma lixeira, de onde podem ser **restauradas** ou **excluídas permanentemente**.
* **Filtro por Status:** Na página de listagem, é possível filtrar tarefas dinamicamente por status ("Não iniciada", "Em andamento", "Concluída").
* **Design Responsivo:** Interface limpa e moderna construída com **Tailwind CSS**.

---

## 🛠️ Tecnologias Utilizadas

* **Backend:** PHP 8.3+ / Laravel 12
* **Frontend:** Tailwind CSS (via CDN)
* **Autenticação:** Laravel Breeze (adaptado para o design do projeto)
* **Banco de Dados:** MySQL e Apache.

---

## ⚙️ Instruções para Rodar Localmente

Siga os passos abaixo para configurar e rodar a aplicação em seu ambiente local.

### Pré-requisitos
* PHP 8.3+
* Composer
* Um banco de dados MySQL (Eu utilizei mysql, mas talvez sqlite fosse interessante também)

### Instalação

1.  **Clonar o repositório (ou extrair o .zip):**
    ```bash
    git clone https://github.com/Sarah6432/ToDoList.git
    cd todolist-app
    ```

2.  **Instalar dependências do PHP (Laravel) e outras:**
    ```bash
    composer install
    nodejs(caso não tenha)
    ```

3.  **Criar o arquivo de ambiente:**
    (Este comando copia o arquivo de exemplo. Você **deve** fazer isso.)
    ```bash
    cp .env.example .env
    ```

4.  **Configurar o Banco de Dados:**
    * Crie um novo banco de dados no seu MySQL (ex: `desafio_tarefas`).
    * Abra o arquivo `.env` que você acabou de criar e edite as seguintes linhas com suas credenciais locais:
        ```env
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=desafio_tarefas
        DB_USERNAME=root
        DB_PASSWORD=(não coloquei senha)
        ```
        Fiz exatamente dessa forma, necessário o apache caso for usar o Mysql.

### Comandos Artisan

5.  **Gerar a Chave da Aplicação:**
    ```bash
    php artisan key:generate
    ```

6.  **Rodar as Migrations (O "Comando Mágico"):**
    (Este comando irá criar todas as tabelas: `users`, `tarefas`, `sessions`, etc.)
    ```bash
    php artisan migrate
    ```

7.  **Rodar o Servidor:**
    ```bash
    php artisan serve
    ```

### Como Acessar

1.  Abra seu navegador em `http://127.0.0.1:8000`.
2.  Você será redirecionado para a tela de **Login**.
3.  Clique em **"Registrar"** no cabeçalho para criar sua conta de usuário.
4.  Após o registro, você estará logado e pronto para usar o sistema.

---

## 📝 Decisões de Design e Estrutura

* **Soft Deletes:** Optei por usar o `SoftDeletes` nativo do Laravel, pois é uma prática robusta que previne a perda acidental de dados. Isso torna a aplicação mais segura para o usuário final.
* **Autenticação com Breeze:** Utilizei o Laravel Breeze para a autenticação por ser seguro e rápido de implementar. As views padrão (Tailwind) foram convertidas para Bootstrap CDN e, posteriormente, todo o projeto foi migrado para **Tailwind CSS CDN**, demonstrando flexibilidade e foco em um design moderno.
* **Filtragem no Controller:** A lógica de filtragem por status foi implementada diretamente no método `index` do `TarefasController`, utilizando a query builder do Eloquent (`Tarefa::query()`). Isso mantém o controller limpo e permite que a mesma view (`index.blade.php`) exiba tanto a lista completa quanto a filtrada, apenas lendo os parâmetros `GET` da URL.

---

## 💡 Melhorias Futuras
* **Gosto muito de aprimorar o frontend das aplicações, então faria possíveis melhorias nisso**
* **Tarefas por Usuário** - Atualmente, todo usuário que se cadastra vê todas as tarefas do banco de dados. Esta funcionalidade faria com que cada usuário visse apenas as tarefas que ele mesmo criou..
* **Prazos e Datas de Vencimento** - Permitir que cada tarefa tenha uma "data de entrega" ou "prazo".
* **Prioridades (Baixa, Média, Alta)** - Permitir que o usuário defina um nível de prioridade para cada tarefa..
* **Ordenação da Lista** - Permitir que o usuário clique nos cabeçalhos da tabela (ex: "Nome", "Status", "Prazo") para reordenar a lista.
* **Categorias ou "Projetos"** - Uma funcionalidade mais avançada. Permitiria ao usuário agrupar tarefas em diferentes "Projetos" ou "Categorias" (ex: "Trabalho", "Estudo", "Pessoal").
