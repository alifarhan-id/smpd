<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sendmail extends CI_Controller
{

    function __construct() {
        parent::__construct();
    }

    function index() {
        $email = $this->input->post('email');
        $name = $this->input->post('name');
        $uname = $this->input->post('uname');
        $upwd = $this->input->post('upwd');
        $idd = $this->input->post('idd');

        $html = '';
        $html .= '<table border="1" cellspacing="0" cellpadding="0">
                  <tr>
                        <td width="20%"><img src="http://180.250.172.123/mpd_ci/images/logo_lombok.png" width="100px"></td>
                        <td width="80%" align="center">
                            PEMERINTAH KABUPATEN LOMBOK UTARA <br>
                            BADAN PENGELOLAAN PENDAPATAN DAERAH <br>
                            Jalan Raya Tioq Tata Tunaq <br>
                            Telpn. (0370) <br>
                            T A N J U N G
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
                  <tr>
                       <td></td>
                  </tr>
                  <tr>
                       <td><a href="http://180.250.172.123/mpd_ci/cetak_kartu_npwpd/pageCetak?t_customer_order_id='.$idd.'"> Cetak Kartu NPWPD </a> </td>
                  </tr>
              </table>'; 
        $html .= '<br><br>';
        $html .= '<table border="0">
                  <tr>
                        <td width="100%">Salam Hormat,<br><br>SMPD - Lombok Utara</td>
                  </tr>
              </table>';      


        // echo $html;
        sendEmail($email, $name, 'Pendaftaran WP', $html);
        exit;
    }

}