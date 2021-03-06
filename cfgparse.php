<?php
/**
 * PHPwikiBot Configuration File Parser
 * @author Xiaomao
 * @package PHPwikiBot
 * @name Configuration Parser
 * @license http://www.gnu.org/licenses/gpl.html GPLv3+
 */

/** Include the required files */
require dirname(__FILE__).'/spyc.php';
require_once dirname(__FILE__).'/stddef.inc';
/** Load config.yml */
$cfg = spyc_load_file('config.yml');

/** Find out some config problems */
if (!isset ($cfg['useragent']) || !is_string($cfg['useragent'])) echo '\'useragent\' MUST be a string!!!'.PHP_EOL;
if (!isset ($cfg['key']) || !is_string($cfg['key'])) echo '\'key\' MUST be a string!!!'.PHP_EOL;
if (!isset ($cfg['logfile']) || !is_string($cfg['logfile'])) echo '\'logfile\' MUST be a string!!!'.PHP_EOL;
if (!isset ($cfg['output_log']) || !is_bool($cfg['output_log'])) echo '\'output_log\' MUST be yes or no!!!'.PHP_EOL;
if (!isset ($cfg['log2stderr']) || !is_bool($cfg['log2stderr'])) echo '\'log2stderr\' MUST be yes or no!!!'.PHP_EOL;

/** Set the variables */
/** User-Agent of the bot */
$useragent = $cfg['useragent'];
/** Password encryption key */
$key = $cfg['key'];
/** Log level handling */
switch ($cfg['log_level']) {
	case 'LG_DEBUG':
		$log_level = LG_DEBUG;
		break;
	case 'LG_INFO':
		$log_level = LG_INFO;
		break;
	case 'LG_NOTICE':
		$log_level = LG_NOTICE;
		break;
	case 'LG_WARN':
		$log_level = LG_WARN;
		break;
	case 'LG_ERROR':
		$log_level = LG_ERROR;
		break;
	case 'LG_FATAL':
		$log_level = LG_FATAL;
		break;
	default:
		echo <<<'EOD'
Error level MUST be one of the following:
 * LG_DEBUG
 * LG_INFO
 * LG_NOTICE
 * LG_WARN
 * LG_ERROR
 * LG_FATAL

EOD;
}
/** Log file */
$logfile = $cfg['logfile'];
/** Whether to output the log */
$output_log = $cfg['output_log'];
/** Log to STDERR??? */
define('LOG_TO_STDERR', $cfg['log2stderr']);
/** Wiki Configuration */
$wiki = $cfg['wiki'];
/** User Configuration */
$users = $cfg['users'];
/** Clean up */
$cfg = null;
