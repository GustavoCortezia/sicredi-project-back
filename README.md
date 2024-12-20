# Sicredi Pioneira RS - Processamento de Movimentações de Conta Corrente

## Descrição do Projeto

O objetivo deste projeto é desenvolver uma aplicação para processamento de dados de movimentações de conta corrente dos associados da Sicredi Pioneira RS. A aplicação realizará as seguintes tarefas:

- Processamento de dados brutos de movimentações bancárias.
- Transformação desses dados em informações estratégicas para a continuidade do negócio.
- Geração de sumarizações e métricas de comportamento dos associados.


Este é um projeto Laravel e Vue 3.x (Typescript), que utiliza um banco de dados MySQL e Docker e Docker Compose para o ambiente de desenvolvimento.

## Pré-requisitos

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/)

## Configuração

1. Clone o repositório para a sua máquina local:

    ```bash
    git clone https://github.com/GustavoCortezia/sicredi-project-back.git
    ```

2. instale as dependências do Laravel:

    ```bash
    composer install
    ```

3. Crie um arquivo `.env` a partir do arquivo `.env.example`, com as seguintes configurações:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=root
    ```

## Subindo a aplicação com Docker

1. **Construa e inicie os containers**:

    ```bash
    docker-compose up -d
    ```

2. **Verifique se os containers estão rodando**:

    ```bash
    docker ps
    ```

## Rodando as migrações e iniciando a aplicação

Depois que os containers estiverem rodando, você pode rodar as migrações do Laravel e iniciar o servidor:

    ```bash
    php artisan migrate
    ```

    ```bash
    php artisan serve
    ```

## Parando a aplicação

Para parar a aplicação, você pode usar o seguinte comando:

```bash
docker-compose down
```

## Visite o projeto Frontend

[https://github.com/GustavoCortezia/sicredi-project-front.git](https://github.com/GustavoCortezia/sicredi-project-front.git)
