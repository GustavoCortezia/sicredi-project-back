<?php

namespace App\Http\Controllers;

use App\Models\Movimentacao;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MovimentacaoController extends Controller
{

    public function processarMovimentacoes(Request $request)
    {
        // Validação dos dados recebidos
        $validator = Validator::make($request->all(), [
            'movimentacoes' => 'required|array',
            'movimentacoes.*.coop' => 'required|string',
            'movimentacoes.*.agencia' => 'required|string',
            'movimentacoes.*.conta' => 'required|string',
            'movimentacoes.*.nome' => 'required|string',
            'movimentacoes.*.documento' => 'required|string',
            'movimentacoes.*.codigo' => 'required|string',
            'movimentacoes.*.descricao' => 'required|string',
            'movimentacoes.*.debito' => 'required|numeric',
            'movimentacoes.*.credito' => 'required|numeric',
            'movimentacoes.*.dataHora' => 'required|date_format:Y/m/d H:i:s',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        // Preparando as movimentações para inserção em massa
        $movimentacoes = $request->input('movimentacoes');

        $dadosParaInserir = array_map(function ($movimentacao) {
            return [
                'coop' => $movimentacao['coop'],
                'agencia' => $movimentacao['agencia'],
                'conta' => $movimentacao['conta'],
                'nome' => $movimentacao['nome'],
                'documento' => $movimentacao['documento'],
                'codigo' => $movimentacao['codigo'],
                'descricao' => $movimentacao['descricao'],
                'debito' => $movimentacao['debito'],
                'credito' => $movimentacao['credito'],
                'data_hora' => $movimentacao['dataHora'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, $movimentacoes);

        try {
            // Inserção em massa das movimentações
            Movimentacao::insert($dadosParaInserir);

            return response()->json(['message' => 'Movimentações processadas com sucesso.'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao processar as movimentações. Detalhes: ' . $e->getMessage()]);
        }
    }





    /**
     * Método para registrar logs de ações no sistema.
     */
    protected function registrarLog($acao, $detalhes)
    {
        Log::create([
            'datahora' => now(),
            'acao' => $acao,
            'detalhes' => $detalhes,
        ]);
    }

    /**
     * Método para exibir as métricas de movimentações.
     */
    public function exibirMetricas()
    {
        // Exemplo de métricas - você pode expandir conforme as especificações detalhadas
        $metricas = [
            // Data com maior quantidade de movimentações
            'maior_data_movimentacao' => Movimentacao::selectRaw('DATE(data_hora) as data, COUNT(*) as total')
                ->groupBy('data')
                ->orderByDesc('total')
                ->first(),

            // Data com menor quantidade de movimentações
            'menor_data_movimentacao' => Movimentacao::selectRaw('DATE(data_hora) as data, COUNT(*) as total')
                ->groupBy('data')
                ->orderBy('total')
                ->first(),

            // Data com maior soma de movimentações (soma de débito e crédito)
            'maior_soma_movimentacao' => Movimentacao::selectRaw('DATE(data_hora) as data, SUM(debito + credito) as total')
                ->groupBy('data')
                ->orderByDesc('total')
                ->first(),

            // Data com menor soma de movimentações (soma de débito e crédito)
            'menor_soma_movimentacao' => Movimentacao::selectRaw('DATE(data_hora) as data, SUM(debito + credito) as total')
                ->groupBy('data')
                ->orderBy('total')
                ->first(),

            // Dia da semana com mais movimentações para os tipos "RX1" e "PX1"
            'movimentacoes_dia_semana_RX1_PX1' => Movimentacao::selectRaw('DAYOFWEEK(data_hora) as dia, COUNT(*) as total')
                ->whereIn('codigo', ['RX1', 'PX1'])
                ->groupBy('dia')
                ->orderByDesc('total')
                ->get(),

            // Quantidade e valor movimentado por coop/agência
            'movimentacoes_por_coop_agencia' => Movimentacao::selectRaw('coop, agencia, COUNT(*) as total, SUM(debito + credito) as total_valor')
                ->groupBy('coop', 'agencia')
                ->orderByDesc('total')
                ->get(),

            // Créditos x Débitos ao longo das horas do dia
            'creditos_debitos_por_hora' => Movimentacao::selectRaw('HOUR(data_hora) as hora, SUM(credito) as total_credito, SUM(debito) as total_debito')
                ->groupBy('hora')
                ->orderBy('hora')
                ->get(),
        ];

        return response()->json($metricas);
    }
}
