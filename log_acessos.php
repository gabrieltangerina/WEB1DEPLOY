<?php
session_start();

date_default_timezone_set('America/Sao_Paulo');

$logFile = 'log.ini';

// Carrega o log.ini ou inicializa os valores
if (file_exists($logFile)) {
    $logs = parse_ini_file($logFile, true);
} else {
    $logs = ['contador' => ['total' => 0], 'paginas' => [], 'log' => []];
}

$pagina = basename($_SERVER['PHP_SELF']);
$ip = $_SERVER['REMOTE_ADDR'];
$dataHora = date('d/m/Y - H:i:s');

// Detecta o navegador
$navegador = 'Desconhecido';
$userAgent = $_SERVER['HTTP_USER_AGENT'];
$navegadores = ['Firefox', 'Chrome', 'Safari', 'Edge', 'Opera'];

foreach ($navegadores as $nav) {
    if (strpos($userAgent, $nav) !== false) {
        $navegador = $nav;
        break;
    }
}

// Atualiza o contador total
$logs['contador']['total']++;

// Atualiza o contador por página
if (!isset($logs['paginas'][$pagina])) {
    $logs['paginas'][$pagina] = 1;
} else {
    $logs['paginas'][$pagina]++;
}

$numeroAcesso = $logs['contador']['total'];
$logEntry = "$numeroAcesso | $pagina | $dataHora | $ip | $navegador";

// Certifica-se de que a seção [log] seja um array válido
if (!isset($logs['log'])) {
    $logs['log'] = [];
}

// Adiciona o novo log
$logs['log']['log_' . $numeroAcesso] = $logEntry;

// Converte para formato .ini
$iniContent = "";
foreach ($logs as $section => $values) {
    $iniContent .= "[$section]\n";
    foreach ($values as $key => $value) {
        $iniContent .= "$key = \"$value\"\n";
    }
    $iniContent .= "\n";
}

// Escreve tudo no log.ini
file_put_contents($logFile, $iniContent);
