<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    //

    public function store_comment(Request $request)
    {

        $request->commen;
        if(!$request->comment)
        {
            return ['status'=>'error','message'=>'comment field is empty'];
        }
        if(!$request->blogId)
        {
            return ['status'=>'error','message'=>'blog Id required'];
        }

        $newComment= new Comment;

        $newComment->comment = $request->comment;
        $newComment->blog_id = $request->blogId;
        $newComment->user_id = $request->userId;

        $newComment->save();

        // $this->sendMsg91('9616197043','HelLo Prashant');
        $this->sendMsg('9616197043','OTP:1234, it will expire in 10 minutes.',1207161622517499116);
        return ['status'=>'success','message'=>'comment added successfully','data'=>$newComment];
        // dd($newComment);
    }

    private function validate_user(Request $request)
    {
        DB::table('table_name')->where('conenction_id',$request->connection_id)->where('auth_code',$request->auth_code)->first();
    }

    public function sendMsg91($recipients,$message) //msg91
    {
        $settings = array();
        $settings['route'] = 4;
        $settings['authkey'] = "213456AYKfU9P5WQwh5ae9791b";
        $settings['mobiles'] = urlencode($recipients);
        $settings['message'] = urlencode($message);
        $settings['country'] = 91;
        $settings['response'] = "json";

        $uri="http://api.msg91.com/api/sendhttp.php?sender=SPNCYL";
        foreach($settings as $key=>$value){
            $uri.='&'.$key.'='.$value;
        }
        //echo $uri;
        $result = file_get_contents($uri);
        return 0;
    }
    public function sendMsg($recipients,$message, $template_id="") //bulk
    {
        $uri='http://bulksms.tekhook.in/app/smsapi/index.php?key=5573081BA8E979&routeid=310&type=text&contacts='.urlencode($recipients).'&senderid=SPNCYL&msg='.urlencode($message).'&tlv={"PE_ID":"1201159274572705556","Template_ID":"'.$template_id.'"}';
        $result = file_get_contents($uri);
        return "success";
    }
}
