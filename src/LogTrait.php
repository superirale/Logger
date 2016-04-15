<?php 
trait LogTrait{

	private $logFile;

	public function writeLog($status, $tag, $message)
	{
		$date = $this->getCurrentTime();
        $msg = "$date: [$tag][$status] - $message" . PHP_EOL;
        file_put_contents($this->logFile, $msg, FILE_APPEND);
	}

	public function consoleLog($message, $type)
	{
		$output = '';

		switch ($type) {
			case 'log':
				$output = "console.log($message)";
				break;
			case 'info':
				$output = "console.info($message)";
				break;
			case 'debug':
				$output = "console.debug($message)";
				break;
			case 'error':
				$output = "console.error($message)";
				break;
			case 'warn':
				$output = "console.warn($message)";
				break;
			
			default:
				$output = "console.log($message)";
				break;
		}

		$output = "<script>".$output."</script>";
		return $output;
	}
	
	private function getCurrentTime()
	{
		$dt = new DateTime();
	 	return $dt->format('Y-m-d H:i:s');
	}
}