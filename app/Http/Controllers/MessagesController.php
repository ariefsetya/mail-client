<?php
//MessagesController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\IMAP\Reader as IR;

class MessagesController extends Controller
{
	public function messages()
	{
		$mail = new IR;

		$data['emails'] = $mail->getListEmail();

		return view('messages')->with($data);
	}

	public function getMessage($ids)
	{
		$mail = new IR;
		$msg = $mail->getDetailMessage($ids);

		return $msg;
	}
}