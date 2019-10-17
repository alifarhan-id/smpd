<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sendmail extends CI_Controller
{

    function __construct() {
        parent::__construct();
    }

    function index() {
        $email = $this->input->post('email');
        $uname = $this->input->post('uname');
        $upwd = $this->input->post('upwd');

        $html = '';
        $html .= '<table border="1" cellspacing="0" cellpadding="0">
                  <tr>
                        <td width="20%"><img src="http://202.149.77.5:82/mpd_ci/images/logo_lombok.png" width="100px"></td>
                        <td width="80%" align="center">
                            PEMERINTAH KABUPATEN LOMBOK UTARA <br>
                            BADAN PENGELOLAAN PENDAPATAN DAERAH <br>
                            JL. Lombok Utara <br>
                            Telp: 021 xxxxx - Fax: 021 xxxxxx <br>
                            LOMBOK UTARA
                        </td>
                  </tr>
              </table>';

        $html .= '<br><br>';
        $html .= '<table border="0">
                  <tr>
                        <td width="100%">Selamat proses verifikasi anda berhasil. <br>
                        Silahkan login dengan akun yang telah anda buat: <br><br>
                        Username : '.$uname.' <br>
                        Password : '.$upwd.' </td>
                  </tr>
              </table>'; 
        $html .= '<br><br>';
        $html .= '<table border="0">
                  <tr>
                        <td width="100%">Salam Hormat,<br><br>SMPD - Lombok Utara</td>
                  </tr>
              </table>';      


        // echo $html;
        sendEmail($email, $uname, 'Pendaftaran WP', $html);
        exit;
    }

}