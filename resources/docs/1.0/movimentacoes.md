## Movimentações


Valida os campos e os insere no banco de dados:



### Endpoint (Login)

o processo de login ocorre consultando o serviço de autenticação, caso os dados existam e sejam válidos, é aplicado as facades de autenticação.

| Method |   URL    |
| :----: | :------: | 
|  POST  | `/metricas` |       

#### Body rules

```json
{
    "movimentacoes": "required|array",
    "coop": "required|string",
    "agencia": "required|string",
    "conta": "required|string",
    "nome": "required|string",
    "documento": "string",
    "codigo": "required|string",
    "descricao": "required|string",
    "debito": "required|numeric",
    "credito": "required|numeric",
    "dataHora": "required|date_format:Y/m/d H:i:s",
}
```

### Responses

> {success.fa-check-circle-o} Movimentações processadas com sucesso.

Código `200`

```json
{
    "success": "boolean",
    "msg": "string",
    "data": {
        "user": {
            "id": "number",
            "name": "string",
            "surname": "string",
            "email": "string",
            "username": "string",
            "avatar_url": "string|null",
            "email_verified_at": "string|null",
            "created_at": "string|date",
            "updated_at": "string|date"
        },
        "token": "string"
    }
}
```

> {danger.fa-times-circle-o} E-mail ou senha invalido!

Código `422`

```json
{
    "success": "boolean",
    "message": "string"
}
```

<a name="request-logout"></a>

## Fazer logout

A autenticação é realizada via tokens. Para todas as rotas protegidas devem ser enviadas em seus cabeçalhos o parâmetro:

```json
{
    "Authorization": "Bearer {...token}"
}
```

### Endpoint (Login)

o processo de logout ocorre consultando o serviço de autenticação, caso os dados existam e sejam válidos, é aplicado as facades de autenticação.

| Method |    URL    | Headers |
| :----: | :-------: | ------- |
| DELETE | `/logout` | Auth    |

### Responses

> {success.fa-check-circle-o} Logout bem-sucedido

Código `200`

```json
{
    "success": "boolean",
    "msg": "Logout feito com sucesso"
}
```

> {danger.fa-times-circle-o} Usuário não estava autenticado

Código `422`

```json
{
    "success": "boolean",
    "message": "string"
}
```
