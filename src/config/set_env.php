<?php

/**
 * @author Masterton
 * @version 1.0.0
 * @time 2018-3-8 09:54:25
 *
 */

// Environment
$env_cfg = [
    'timezone' => 'Asia/Shanghai',
    'error_reporting' => E_ALL,
    'display_errors' => true,
    'log_errors' => true,
    'error_log' => true,
    'local' => 'zh_CN.UTF-8'
];

date_default_timezone_set($env_cfg['timezone']);
error_reporting($env_cfg['error_reporting']);
ini_set('display_errors', $env_cfg['display_errors']);
ini_set('log_errors', $env_cfg['log_errors']);
ini_set('error_log', $env_cfg['error_log']);
setlocale(LC_ALL, $env_cfg['local']);