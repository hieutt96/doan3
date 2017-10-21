<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller; 
use Illuminate\Support\Facades\Mail;
class MailController extends Controller
{
    public static function mailAccept ($company){
    	Mail::send('company.mailaccept',['company'=>$company],function($message) use ($company){
 			$message->from('support@trungbay.com','Kich Hoa Tai Khoan');
 			$message->subject('Kich Hoat Tai Khoan ')->to($company->emailnv,$company->name);   		
    	});
    }
}
