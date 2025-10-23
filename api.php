<?php
require 'vendor/autoload.php';

use ZxcvbnPhp\Zxcvbn;

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Inicializa o validador de senha
$zxcvbn = new Zxcvbn();

// --- Funções de Lógica ---

/**
 * Gera uma senha aleatória baseada em parâmetros.
 */
function generateSecurePassword($length, $use_numbers, $use_special) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    if ($use_numbers) {
        $chars .= '0123456789';
    }
    if ($use_special) {
        $chars .= '!@#$%^&*()-_=+[]{}|;:,.<>?/~';
    }
    
    if (strlen($chars) === 0) {
        throw new Exception("Nenhum tipo de caractere selecionado.");
    }

    $password = '';
    $charLength = strlen($chars) - 1;
    for ($i = 0; $i < $length; $i++) {
        try {
             $password .= $chars[random_int(0, $charLength)];
        } catch (Exception $e) {
             // Fallback simples caso random_int falhe (embora improvável)
             $password .= $chars[mt_rand(0, $charLength)];
        }
    }
    return $password;
}

/**
 * Valida e pontua a força da senha usando Zxcvbn.
 */
function validatePasswordStrength($password, $user_inputs = []) {
    global $zxcvbn;
    
    $results = $zxcvbn->passwordStrength($password, $user_inputs);
    
    // Simplificando o output para o frontend
    $feedback = [
        'score' => $results['score'], // 0 (pior) a 4 (melhor)
        'warning' => $results['feedback']['warning'],
        'suggestions' => $results['feedback']['suggestions'],
        'crack_time' => $results['crack_times_display']['online_throttling_100_per_hour'],
    ];

    return $feedback;
}


// --- Lógica da API ---

$method = $_SERVER['REQUEST_METHOD'] ?? '';

if ($method === 'POST') {
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    $action = $data['action'] ?? '';
    
    $result = ['success' => false, 'data' => null, 'error' => ''];

    try {
        switch ($action) {
            case 'generate':
                $length = (int) ($data['length'] ?? 16);
                $use_numbers = (bool) ($data['use_numbers'] ?? true);
                $use_special = (bool) ($data['use_special'] ?? true);
                
                $password = generateSecurePassword($length, $use_numbers, $use_special);
                $result['success'] = true;
                $result['data'] = ['password' => $password];
                break;

            case 'validate':
                $password = $data['password'] ?? '';
                if (empty($password)) {
                    throw new Exception("A senha para validação não pode ser vazia.");
                }
                
                $validation_result = validatePasswordStrength($password);
                $result['success'] = true;
                $result['data'] = $validation_result;
                break;
                
            default:
                throw new Exception('Ação inválida.');
        }
    } catch (Exception $e) {
        http_response_code(400);
        $result['error'] = $e->getMessage();
    }

    echo json_encode($result);
    
} elseif ($method === 'OPTIONS') {
    http_response_code(200);
    exit();
} else {
    http_response_code(405);
    echo json_encode(['success' => false, 'error' => 'Método não permitido.']);
}
