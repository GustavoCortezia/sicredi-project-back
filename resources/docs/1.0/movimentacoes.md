## Movimentações


Valida os campos e os insere no banco de dados:



### Endpoint

| Method |   URL    |
| :----: | :------: | 
|  POST  | `/processar` |       

#### Body rules

```json
{
    "movimentacoes.*.movimentacoes": "required|array",
    "movimentacoes.*.coop": "required|string",
    "movimentacoes.*.agencia": "required|string",
    "movimentacoes.*.conta": "required|string",
    "movimentacoes.*.nome": "required|string",
    "movimentacoes.*.documento": "required|string",
    "movimentacoes.*.codigo": "required|string",
    "movimentacoes.*.descricao": "required|string",
    "movimentacoes.*.debito": "required|numeric",
    "movimentacoes.*.credito": "required|numeric",
    "movimentacoes.*.dataHora": "required|date_format:Y/m/d H:i:s",
}
```

### Responses

> {success.fa-check-circle-o} Movimentações processadas com sucesso.

Código `200`

```json
{
    "success": "boolean",
    "message": "string",
    "data": [{
        "agencia": "string",
        "codigo": "string",
        "conta": "string",
        "coop": "string",
        "credito": "number",
        "data_hora": "string|date",
        "debito": "number",
        "descricao": "string",
        "documento": "string|null",
        "nome": "string",
    }]
}
```

> {danger.fa-times-circle-o} Erro ao Processar Movimentações

Código `500`

```json
{
    "success": "boolean",
    "message": "string"
}
```


