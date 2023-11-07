<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Precificacoes extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('core_model');

        if (!$this->ion_auth->logged_in()) {
            redirect('login');
        }
    }

    public function index()
    {

        $data = array(
            'title' => 'Precificações Cadastradas',
            'subtitle' => 'Listando todas as precificações cadastrados no bando de dados.',
            'icone_view' => 'fas fa-dollar-sign',

            'styles' => array(
                'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css'
            ),

            'scripts' => array(
                'plugins/datatables.net/js/jquery.dataTables.min.js',
                'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
                'plugins/datatables.net/js/estacionamento.js',
                'plugins/mask/jquery.mask.min.js',
                'plugins/mask/custom.js',
            ),

            'precificacoes' => $this->core_model->get_all('precificacoes'),
        );


        $this->load->view('layout/header', $data);
        $this->load->view('precificacoes/index');
        $this->load->view('layout/footer');
    }

    public function core($precificacao_id = NULL)
    {

        if(!$precificacao_id){

            //cadasatrando

        }
        else{

            //atualizando

            if(!$this->core_model->get_by_id('precificacoes', array('precificacao_id' => $precificacao_id ))){
                $this->session->set_flashdata('error', 'Precificação não encontrada');
                redirect($this->router->fetch_class());
            }
            else{


                $this->form_validation->set_rules('precificacao_categoria','Categoria','trim|required|min_length[5]|max_length[30]|callback_check_categoria');
                $this->form_validation->set_rules('precificacao_valor_hora', 'Valor Hora', 'trim|required|max_length[50]');
                $this->form_validation->set_rules('precificacao_valor_mensalidade', 'Valor Mensalidade', 'trim|required|max_length[50]');
                $this->form_validation->set_rules('precificacao_numero_vagas', 'Número de Vagas ', 'trim|required|integer|greater_than[0]');


                if($this->form_validation->run()){

                    $precificacao_ativa = $this->input->post('precificacao_ativa');
                    
                    if($precificacao_ativa == 0){

                        if($this->db->table_exists('estacionar')){
                            
                        }
                    }

                }
                else{

                    $data = array(
                        'title' => 'Editar Precificações',
                        'subtitle' => 'Editando todas as precificações cadastradas no bando de dados.',
                        'icone_view' => 'fas fa-dollar-sign',
            
                        'styles' => array(
                            'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css'
                        ),
    
                        'scripts' => array(
                            'plugins/datatables.net/js/jquery.dataTables.min.js',
                            'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
                            'plugins/datatables.net/js/estacionamento.js',
                            'plugins/mask/jquery.mask.min.js',
                            'plugins/mask/custom.js',
                        ),
            
                        'precificacoes' => $this->core_model->get_by_id('precificacoes', array('precificacao_id' => $precificacao_id )),
                    );
            
            
                    $this->load->view('layout/header', $data);
                    $this->load->view('precificacoes/core');
                    $this->load->view('layout/footer');

                }

            }

        }
        
    }
    
    public function check_categoria($precificacao_categoria){

        $precificacao_id = $this->input->post('precificacao_id');

        if($this->core_model->get_by_id('precificacoes', array('precificacao_categoria' => $precificacao_categoria, 'precificacao_id !=' => $precificacao_id))){

            $this->form_validation->set_message('check_categoria', 'Esta categoria já existe.');
            
            return FALSE;
        }
        else{
            return TRUE;
        }

    }
}
