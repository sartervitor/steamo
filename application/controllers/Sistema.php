<?php

defined('BASEPATH') or exit('Acesso negado');

class Sistema extends CI_Controller
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

        $this->form_validation->set_rules('sistema_razao_social', 'Razão Social', 'trim|required|min_length[5]|max_length[145]');
        $this->form_validation->set_rules('sistema_nome_fantasia', 'Nome Fantasia', 'trim|required|min_length[5]|max_length[145]');
        $this->form_validation->set_rules('sistema_cnpj', 'CNPJ', 'trim|required|exact_length[18]');
        $this->form_validation->set_rules('sistema_ie', 'Inscrição Estadual', 'trim|required|min_length[5]|max_length[25]');
        $this->form_validation->set_rules('sistema_telefone_fixo', 'Telefone Fixo', 'trim|required|exact_length[14]');
        $this->form_validation->set_rules('sistema_telefone_movel', 'Telefone Móvel', 'trim|required|min_length[14]|max_length[15]');
        $this->form_validation->set_rules('sistema_email', 'Email', 'trim|required|valid_email|max_length[100]');
        $this->form_validation->set_rules('sistema_site_url', 'URL', 'trim|required|valid_url|max_length[100]');
        $this->form_validation->set_rules('sistema_cep', 'CEP', 'trim|required|exact_length[9]');
        $this->form_validation->set_rules('sistema_endereco', 'Endereço', 'trim|required|max_length[145]');
        $this->form_validation->set_rules('sistema_numero', 'Número', 'trim|required|max_length[4]');
        $this->form_validation->set_rules('sistema_cidade', 'Cidade', 'trim|required|max_length[45]');
        $this->form_validation->set_rules('sistema_estado', 'Estado', 'trim|required|max_length[2]');
        $this->form_validation->set_rules('sistema_referencia', 'Referência', 'trim|required|max_length[45]');
        $this->form_validation->set_rules('sistema_txt_ordem_servico', 'Ordem de Serviço', 'trim|required');


        if ($this->form_validation->run()) {

            $data = elements(
                array(
                    'sistema_razao_social',
                    'sistema_nome_fantasia',
                    'sistema_cnpj',
                    'sistema_ie',
                    'sistema_telefone_fixo',
                    'sistema_telefone_movel',
                    'sistema_email',
                    'sistema_site_url',
                    'sistema_cep',
                    'sistema_endereco',
                    'sistema_numero',
                    'sistema_cidade',
                    'sistema_estado',
                    'sistema_referencia',
                    'sistema_txt_ordem_servico',
                ), 
                $this->input->post()

            );
            

            $data = html_escape($data);

            $this->core_model->update('sistema', $data, array('sistema_id' => 1));

            redirect($this->router->fetch_class());

            // echo '<pre>';
            // print_r($this->input->post());
            // exit();

        } else {

            $data = array(
                'title' => 'Editar Informações do Sistema',
                'subtitle' => 'Editando informações do sistema',
                'icone_view' => 'ik ik-settings',


                'scripts' => array(
                    'plugins/mask/jquery.mask.min.js',
                    'plugins/mask/custom',
                ),

                'sistema' => $this->core_model->get_by_id('sistema', array('sistema_id' => 1))
            );


            $this->load->view('layout/header', $data);
            $this->load->view('sistema/index');
            $this->load->view('layout/footer');
        }
    }
}
