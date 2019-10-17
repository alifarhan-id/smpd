<?php defined('BASEPATH') OR exit('No direct script access allowed');

class SendNotification extends CI_Controller
{

    function __construct() {
        parent::__construct();
    }

    function index() {
        echo "Send Notification";
        exit;
    }

    function request_url($TOKEN, $method)
    {
      return "https://api.telegram.org/bot" . $TOKEN . "/". $method;
    }

    function send_reply($TOKEN, $chatid, $msgid, $text)
    {
      $data = array(
        'chat_id' => $chatid,
        'text'  => $text,
        //'reply_to_message_id' => $msgid
      );
      // use key 'http' even if you send the request to https://...
      $options = array(
        'http' => array(
          'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
          'method'  => 'POST',
          'content' => http_build_query($data),
        ),
      );
      $context  = stream_context_create($options);
      $result = file_get_contents($this->request_url($TOKEN, 'sendMessage'), false, $context);
      return $result;
    }

    function telegram(){
      $TOKEN = '505283647:AAEeuIBUfIyVQZ6pQftt6ihiS1hDZP5XCxI';
      // $chatid = $_GET['id'];
      // $message= $_GET['msg'];
      $data = array();
      $sql = "select b.t_notification_pool_id, a.messager_id, b.message_body
                from p_notification a, t_notification_pool b
                where a.p_notification_id = b.p_notification_id
                and b.send_date is null
                and notification_type_id = 1";        
      $output = $this->db->query($sql);
      $data = $output->result_array();

      if(count($data) > 0){
        for ($i=0; $i < count($data); $i++) { 
            $t_notification_pool_id = $data[$i]['t_notification_pool_id'];
            $chatid = $data[$i]['messager_id'];
            $message = $data[$i]['message_body'];
            $pool_id = $data[$i]['t_notification_pool_id'];

            if(isset($TOKEN) && isset($chatid) && isset($message)){

              $status = json_decode($this->send_reply($TOKEN, $chatid,5,$message));

              if($status->ok){
                 echo 'Berhasil';
                 $sqlupdate = "update t_notification_pool
                            set send_date = now()
                            where t_notification_pool_id = ?";

                 $this->db->query($sqlupdate, array($pool_id));
              }else{
                echo 't_notification_pool : '.$pool_id.' Gagal';
              }

            }else{
              echo 'Failed, missing some parameter';
            }

        }
      }else{
        echo 'Data tidak ada';
      }
      

    }


    function email(){
      $data = array();
      $sql = "select b.t_notification_pool_id, a.messager_id, b.message_subject, b.message_body
                from p_notification a, t_notification_pool b
                where a.p_notification_id = b.p_notification_id
                and b.send_date is null
                and notification_type_id = 2";        
      $output = $this->db->query($sql);
      $data = $output->result_array();

      if(count($data) > 0){
        for ($i=0; $i < count($data); $i++) { 
          $email = $data[$i]['messager_id'];
          $subject = $data[$i]['message_subject'];
          $message = $data[$i]['message_body'];
          $pool_id = $data[$i]['t_notification_pool_id'];


          $result = sendEmail($email, 'Notifikasi', $subject, $message);

          if($result){
              echo 'Berhasil';

              $sqlupdate = "update t_notification_pool
                            set send_date = now()
                            where t_notification_pool_id = ?";

              $this->db->query($sqlupdate, array($pool_id));
          }else{
            echo 't_notification_pool : '.$pool_id.' Gagal';
          }

        }
      }else{
        echo 'Data tidak ada';
      }
    }

}