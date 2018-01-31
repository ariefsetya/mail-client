<?php
//Reader.php
namespace App\Http\Controllers\IMAP;

class Reader
{

	private $inbox;
	private $mailserver;
	private $connection;
	private $username;
	private $password;
	private $port;
	private $emails;

	public function __construct()
	{
		$this->mailserver = env('IMAP_MAILSERVER');
		$this->username = env('IMAP_USERNAME');
		$this->password = env('IMAP_PASSWORD');
		$this->port = env('IMAP_PORT');

		$hostname = '{'.$this->mailserver.':'.$this->port.'/imap/ssl}INBOX';

		$this->inbox = imap_open($hostname,
							$this->username,
							$this->password) or die('Cannot connect to Gmail: ' . imap_last_error());

		$this->emails = imap_search($this->inbox,'ALL');
	}

	public function getListEmail($count = 10)
	{
		rsort($this->emails);

		if(sizeof($this->emails)<$count){
			$count = sizeof($this->emails);
		}

		$result = [];

		if($this->emails){
			for($i=0;$i<$count;$i++) {
				$child = $this->emails[$i];
				$overview = imap_fetch_overview($this->inbox,$child,0);

				$result[] = [
								'from'=>$overview[0]->from,
								'subject'=>$overview[0]->subject,
								'date'=>$overview[0]->date,
								'seen'=>$overview[0]->seen,
								'ids'=>$child,
							];
			}
		}

		return $result;
	}

	public function getDetailMessage($ids=false)
	{
		$message = "";
		if($ids){
			$message = imap_fetchbody($this->inbox,$ids,2);
		}else{
			$message = "No Message ID";
		}
		return ['msg'=>$message];
	}

	public function __destruct()
	{
		imap_close($this->inbox);
	}
}