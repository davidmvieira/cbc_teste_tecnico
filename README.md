Como configurar o projeto:
- Requisitos:
    - Docker 

Após clonar projeto na raiz e crie o Arquivo .env com o comando:

 cp .env.docker .env

Logo após, siga até a pasta "./src", nela novamente vamos usar o comando 

cp .env.laravel .env

Se necessário, ajuste as variáveis para a criação do ambiente.

Volte à raiz do projeto e execute o comando para subir os containers do projeto, com o comando:

"docker-compose up -d"

Logo após concluir o build acesse o container, usando

"docker-compose exec app bash"

Para que possamos instalar as dependências do projeto

"composer install"

E ainda dentro do container gerar a key do projeto Laravel

"php artisan key:generate"

Se, não houver nenhuma alteração o projeto estará acessivel em:
[http://localhost:8989]
