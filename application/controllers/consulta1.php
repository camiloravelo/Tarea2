<?php

if (!defined('BASEPATH'))
    exit("No esta el directorio");

class consulta1 extends CI_Controller {

    public function index() {

    //    $this->load->database();
       $query = $this->db->query("SELECT concat_ws(' ',first_name,last_name) as nombre_apellido, birth_date, gender  from employees where gender='M' AND birth_date<'1954-01-01'");
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
        $query = $this->db->query('SELECT dept_name FROM departments');

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
        $query = $this->db->query("SELECT e.emp_no as emp_no, e.first_name as first_name, s.salary as salary, d.dept_no as dept_no, dep.dept_name as dept_name  FROM employees e, salaries s, dept_emp  d, departments dep WHERE e.emp_no=s.emp_no AND s.emp_no < 23000 AND e.emp_no=d.emp_no AND d.dept_no=dep.dept_no GROUP BY e.emp_no");
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