<?php

if (!defined('BASEPATH'))
    exit("No esta el directorio");

class consulta1 extends CI_Controller {

    public function index() {

    //    $this->load->database();
        $this->load->library('pagination');
        $config['base_url'] = 'http://192.168.1.33:8081/tarea2/index.php/consulta1/';
        $config['per_page'] = 100;
        $config['total_rows'] =500;
        $getD= $this->uri->segment(4);
        if( $getD>0 ) $config['per_page'] = $getD;
        $this->pagination->initialize($config); 
        $this->db->cache_on();

       $query = $this->db->query("SELECT concat_ws(' ',first_name,last_name) as nombre_apellido, birth_date, gender  from employees where gender='M' AND birth_date<'1954-01-01' LIMIT 0".",".$config['per_page']);
        $d = "<table>
                <tr>
                  <th scope='col'><strong>nombre_apellido</strong></th>
                  <th scope='col'><strong>birth_date </strong></th>
                  <th scope='col'><strong> gender</strong></th>
                </tr>";
        foreach ($query->result() as $datos) {
            $d.= " <tr><td>".$datos->nombre_apellido."</td>";
            $d.= "<td>".$datos->birth_date."</td>";
            $d.= "<td>".$datos->gender."</td> </tr>";
        }
        $datosAEnviar = array('hola' => $d);

       // $this->load->database();
        $this->load->view('consulta1',$datosAEnviar);
    }


    public function hola() {
        //$this->load->database();

        $this->load->library('pagination');
        $config['base_url'] = 'http://192.168.1.33:8081/tarea2/index.php/consulta1/hola/';
        $config['per_page'] = 20;
        $config['total_rows'] =500;
        $getD= $this->uri->segment(3);

        if( $getD>0 ) $config['per_page'] = $getD;
        $this->pagination->initialize($config); 
        $this->db->cache_on();

        $query = $this->db->query("SELECT dept_name FROM departments LIMIT 0".",".$config['per_page']);

        $d ="<table>
                <tr>
                  <th scope='col'><strong>nombre_departamento</strong></th>
                  </tr>";
        foreach ($query->result() as $datos) {
            $d.="<tr><td>".$datos->dept_name."</td></tr>";
        }
        $datosAEnviar = array('hola' => $d);

        // $this->load->database();
        $this->load->view('consulta1',$datosAEnviar);
    }


    public function chao() {
        //$this->load->database();

        $this->load->library('pagination');
        $config['base_url'] = 'http://192.168.1.33:8081/tarea2/index.php/consulta1/chao/';
        $config['per_page'] = 20;
        $config['total_rows'] =500;
        $getD= $this->uri->segment(3);

        if( $getD>0 ) $config['per_page'] = $getD;
        $this->pagination->initialize($config); 
        $this->db->cache_on();
        $query = $this->db->query("SELECT e.emp_no as emp_no, e.first_name as first_name, s.salary as salary, d.dept_no as dept_no, dep.dept_name as dept_name  FROM employees e INNER JOIN  salaries s on e.emp_no=s.emp_no INNER JOIN dept_emp d on e.emp_no=d.emp_no INNER JOIN departments dep on d.dept_no=dep.dept_no  WHERE e.emp_no < 20000 AND s.salary >109000  GROUP BY e.emp_no  LIMIT 0".",".$config['per_page']);
        
        

//as emp_no, e.first_name as first_name, s.salary as salary, d.dept_no as dept_no, dep.dept_name as dept_name 
        $d = "<table>
                <tr>
                  <th scope='col'><strong>N° Empleado</strong></th>
                  <th scope='col'><strong>Nombre</strong></th>
                  <th scope='col'><strong> Salario</strong></th>
                  <th scope='col'><strong> N° Departamento</strong></th>
                  <th scope='col'><strong> Nombre Departamento</strong></th>
                </tr>";
        foreach ($query->result() as $datos) {
            $d.= " <tr><td>".$datos->emp_no."</td>";
            $d.= "<td>".$datos->first_name."</td>";
            $d.= "<td>".$datos->salary."</td>";
            $d.= "<td>".$datos->dept_no."</td>";
            $d.= "<td>".$datos->dept_name."</td> </tr>";
        }
        $hola = array('hola' => $d);

       // $this->load->database();
        $this->load->view('consulta1',$hola);
    }




}

?>