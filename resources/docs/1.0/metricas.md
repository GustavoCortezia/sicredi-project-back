## Métricas

Retorna métricas sobre as movimentações na conta corrente.


### Endpoint

| Method |   URL    | 
| :----: | :------: |
|  GET  | `/metricas` |         


### Responses

> {success.fa-check-circle-o} Métricas exibidas com sucesso!

Código `200`

```json
{
    "success": "boolean",
    "message": "string",
    "metricas": {
        "maior_data_movimentacao": {
            "data": "date",
            "total": "number"
        },
        "menor_data_movimentacao": {
            "data": "date",
            "total": "number"
        },
        "maior_soma_movimentacao": {
            "data": "date",
            "total": "number"
        },
        "menor_soma_movimentacao": {
            "data": "date",
            "total": "number"
        },
        "movimentacoes_dia_semana_RX1_PX1": {
            "dia": "string",
            "total": "number"
        },
        "movimentacoes_por_coop_agencia": [
            {
                "coop": "string",
                "agencia": "string",
                "total": "number",
                "total_valor": "string"
            },              
        ],
        "movimentacoes_por_coop_agencia": [
            {
                "hora": "number",
                "total_credito": "string",
                "total_debito": "string"
            },
        ]   
    }
}
```

> {danger.fa-times-circle-o} Erro ao Exibir Métricas

Código `500`

```json
{
    "success": "boolean",
    "message": "string"
}
```

