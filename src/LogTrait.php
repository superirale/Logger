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
		$message = is_array($message)? json_encode($message): $message;
	

		$output = '';
		
		switch ($type) {
			case 'log':
				$method = "log";
				break;
			case 'info':
				$method = "info";
				break;
			case 'debug':
				$method = "debug";
				break;
			case 'error':
				$method = "error";
				break;
			case 'warn':
				$method = "warn";
				break;
			
			default:
				$method = "log";
				break;
		}

		$output = "<script>console.$method('".self::getCurrentTime()." - [PHP]: ".$message."');</script>";
		echo $output;
	}
	
	private function getCurrentTime()
	{
		$dt = new DateTime();
	 	return $dt->format('M-d-Y H:i:s');
	}
}