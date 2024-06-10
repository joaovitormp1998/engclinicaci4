<?php

namespace App\Controllers;

use CodeIgniter\Controller;  // Import the base Controller class

class Home extends Controller  // Extend the base Controller
{
    public function index()
    {
        // Use CodeIgniter's database connection (safer and more convenient)
        $db = \Config\Database::connect();

        // Query for equipment count
        $queryEquipamentos = $db->query("SELECT COUNT(*) as total FROM equipamento");
        $qtdEquipamentos = $queryEquipamentos->getRow()->total;

        // Calculate dates (using DateTime for better readability)
        $hoje = new \DateTime();
        $datafinal = $hoje->modify('+7 day');
        $datecerta = $datafinal->format('Y-m-d');

        // Query for preventive maintenance orders
        $queryPreventivas = $db->query("SELECT COUNT(*) as total FROM ordem_servico WHERE fk_ordem_servico_tipo = 1 AND data_proxima = ?", [$datecerta]);
        $qtdPreventivas = $queryPreventivas->getRow()->total;

        // Query for overdue orders
        $queryAtrasadas = $db->query("SELECT COUNT(*) as total FROM ordem_servico AS os JOIN equipamento AS eq ON os.fk_equipamento = eq.id WHERE fk_ordem_servico_tipo = 1 AND data_proxima < CURRENT_DATE");
        $qtdAtrasadas = $queryAtrasadas->getRow()->total;

        $data = [
            'qtdEquipamentos' => $qtdEquipamentos,
            'qtdPreventivas' => $qtdPreventivas,
            'qtdAtrasadas' => $qtdAtrasadas
        ];

        return view('common/template', ['content' => view('home/index', $data)]);
    }
}
