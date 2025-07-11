Como configurar o projeto:
- Requisitos:
    - Docker 

Após clonar projeto, na raiz devemos executar o comando:

    cp .env.docker .env

Logo após, execute este proximo comando para criar o .env do Laravel 

    cp src/.env.laravel src/.env

Se necessário, ajuste as variáveis para a criação do ambiente.
Volte à raiz do projeto e execute o comando para subir os containers do projeto, com o comando:

    docker-compose up -d

Logo após concluir o build acesse o container, usando

    docker-compose exec app bash

Para que possamos instalar as dependências do projeto

    composer install

E ainda dentro do container gerar a key do projeto Laravel

    php artisan key:generate

Se, não houver nenhuma alteração o projeto estará acessivel em:
[http://localhost:8989]

Ainda no container executar:

    php artisan migrate

ele deve perguntar se deseja criar o DB aceite assim as tabelas serão criadas no banco 
e agora vamos popular a tabela:

    php artisan db:seed

pronto, agora nossa api já pode ser testada, 
na raiz do projeto possui uma pasta POSTMAN, onde consta as rotas configuradas para serem utilizadas.