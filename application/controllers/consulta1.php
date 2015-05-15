<?php

if (!defined('BASEPATH'))
    exit("No esta el directorio");

class consulta1 extends CI_Controller {

    public function index() {

    //    $this->load->database();
        $this->load->view('consulta1');
    }

    public function hola() {
 //$this->load->database();
        $query = $this->db->query('SELECT dept_no FROM dept_manager');

        $d = "";
        foreach ($query->result() as $datos) {
            $d.=$datos->dept_no . " -- ";
        }
        $datosAEnviar = array('hola' => $d);

       // $this->load->database();
        $this->load->view('consulta1',$datosAEnviar);
    }

}

?>