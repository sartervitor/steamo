<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Controller
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
            'title' => 'Usuários Cadastrados',
            'subtitle' => 'Listando todos os usuarios cadastrados no bando de dados.',
            'title_table' => 'Usuários cadastrados no sistema.',
            'icone_view' => 'fa-solid fa-users',

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

            'usuarios' => $this->ion_auth->users()->result(),
        );


        $this->load->view('layout/header', $data);
        $this->load->view('usuarios/index');
        $this->load->view('layout/footer');
    }

    public function core($usuario_id = NULL)
    {

        if (!$usuario_id) {

            $this->form_validation->set_rules('first_name', 'Nome', 'trim|required|min_length[4]|max_length[20]');
            $this->form_validation->set_rules('last_name', 'Sobrenome', 'trim|required|min_length[4]|max_length[20]');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[100]|is_unique[users.username]');
            $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required|min_length[5]|max_length[100]|is_unique[users.email]');
            $this->form_validation->set_rules('password', 'Senha', 'trim|required|min_length[8]');
            $this->form_validation->set_rules('confirmacao', 'Confirmação de Senha', 'trim|required|matches[password]|min_length[8]');

            if ($this->form_validation->run()) {

                $username = html_escape($this->input->post('username'));
                $password = html_escape($this->input->post('password'));
                $email = html_escape($this->input->post('email'));
                $additional_data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'phone' => $this->input->post('phone'),
                    'company' => $this->input->post('company'),
                    'active' => $this->input->post('active'),
                );
                $group = array($this->input->post('perfil'));

                $additional_data = html_escape($additional_data);

                if ($this->ion_auth->register($username, $password, $email, $additional_data, $group)) {
                    $this->session->set_flashdata('sucesso', 'Dados salvos com sucesso!');
                } else {
                    $this->session->set_flashdata('error', 'Erro ao salvar os dados!');
                }

                redirect($this->router->fetch_class());
            } else {

                $data = array(
                    'title' => 'Cadastrar Usuário',
                    'subtitle' => 'Cadastrando novo usuário.',
                    'icone_view' => 'fa-solid fa-user',
                    'campo_obg' => 'Campo Obrigatório',
                );

                $this->load->view('layout/header', $data);
                $this->load->view('usuarios/core');
                $this->load->view('layout/footer');
            }
        } else {


            if (!$this->ion_auth->user($usuario_id)->row()) {

                exit('Usuario não existe.');
            } else {
                $perfil_atual = $this->ion_auth->get_users_groups($usuario_id)->row();

                $this->form_validation->set_rules('first_name', 'Nome', 'trim|required|min_length[4]|max_length[20]');
                $this->form_validation->set_rules('last_name', 'Sobrenome', 'trim|required|min_length[4]|max_length[20]');
                $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[100]|callback_username_check');
                $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required|min_length[5]|max_length[100]|callback_email_check');
                $this->form_validation->set_rules('password', 'Senha', 'trim|min_length[8]');
                $this->form_validation->set_rules('confirmacao', 'Confirmação de Senha', 'trim|matches[password]|min_length[8]');

                if ($this->form_validation->run()) {


                    $data = elements(
                        array(
                            'first_name',
                            'last_name',
                            'username',
                            'email',
                            'password',
                            'active',
                            'company',
                            'phone',
                        ),
                        $this->input->post()
                    );

                    $password = $this->input->post('password');

                    if (!$password) {
                        unset($data['password']);
                    }

                    $data = html_escape($data);

                    if ($this->ion_auth->update($usuario_id, $data)) {

                        $perfil_post = $this->input->post('perfil');

                        if ($perfil_atual->id != $perfil_post) {

                            $this->ion_auth->remove_from_group($perfil_atual->id, $usuario_id);
                            $this->ion_auth->add_to_group($perfil_post, $usuario_id);
                        }

                        $this->session->set_flashdata('sucesso', 'Dados atualizados com sucesso!');
                    } else {

                        $this->session->set_flashdata('error', 'Não foi possível atualizar os dados.');
                    }

                    redirect($this->router->fetch_class());
                } else {

                    $data = array(
                        'title' => 'Editar Usuário',
                        'subtitle' => 'Editando usuarios cadastrados no bando de dados.',
                        'icone_view' => 'fa-solid fa-user',
                        'campo_obg' => 'Campo Obrigatório',
                        'usuarios' => $this->ion_auth->user($usuario_id)->row(),
                        'perfil_usuario' => $this->ion_auth->get_users_groups($usuario_id)->row(),
                        
                        'scripts' => array(
                            'plugins/mask/jquery.mask.min.js',
                            'plugins/mask/custom',
                        ),
                    );

                    $this->load->view('layout/header', $data);
                    $this->load->view('usuarios/core');
                    $this->load->view('layout/footer');
                }
            }
        }
    }

    public function username_check($username)
    {


        $usuario_id = $this->input->post('usuario_id');

        if ($this->core_model->get_by_id('users', array('username' => $username, 'id !=' => $usuario_id))) {
            $this->form_validation->set_message('username_check', 'Esse usuário já existe!');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function email_check($email)
    {

        $usuario_id = $this->input->post('usuario_id');

        if ($this->core_model->get_by_id('users', array('email' => $email, 'id !=' => $usuario_id))) {
            $this->form_validation->set_message('email_check', 'Esse email já existe!');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function del($usuario_id = NULL)
    {

        if (!$usuario_id || !$this->core_model->get_by_id('users', array('id' => $usuario_id))) {


            $this->session->set_flashdata('error', 'Usuário não encontrado');
            redirect($this->router->fetch_class());
        } else {

            //deleta usuario

            if ($this->ion_auth->is_admin($usuario_id)) {
                $this->session->set_flashdata('error', 'Administrador não pode ser excluido.');
                redirect($this->router->fetch_class());
            }

            if ($this->ion_auth->delete_user($usuario_id)) {
                $this->session->set_flashdata('sucesso', 'Registro exluido com sucesso!');
            } else {
                $this->session->set_flashdata('error', 'Não foi possível excluir o registro!');
            }

            redirect($this->router->fetch_class());
        }
    }
}
