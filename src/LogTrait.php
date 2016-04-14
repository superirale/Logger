<?php 
trait LogTrait{

	private $logFile;
	
	public function writeLog($status, $tag, $message)
	{
		$date = $this->getCurrentTime();
        $msg = "$date: [$tag][$status] - $message" . PHP_EOL;
        file_put_contents($this->logFile, $msg, FILE_APPEND);
	}
	
	private function getCurrentTime()
	{
		$dt = new DateTime();
	 	return $dt->format('Y-m-d H:i:s');
	}
}