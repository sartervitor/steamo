<?php $this->load->view('layout/navbar') ?>

<div class="page-wrap">

    <?php $this->load->view('layout/sidebar') ?>

    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="<?= $icone_view; ?> bg-blue"></i>
                            <div class="d-inline">
                                <h5><?= $title ?></h5>
                                <span><?= $subtitle ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <nav class="breadcrumb-container" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a data-toggle="tooltip" data-placement="bottom" title="Home" href="<?= base_url('') ?>home"><i class="ik ik-home"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <?php if ($message = $this->session->flashdata('sucesso')) : ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong><i class="fa-solid fa-check fa-beat"></i> <?= $message ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="ik ik-x"></i>
                            </button>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <?= isset($sistema->sistema_data_alteracao) ? '<i class="ik ik-calendar"></i>&nbsp;Data da última alteração: ' . formata_data_banco_com_hora($sistema->sistema_data_alteracao) : '' ?>
                        </div>
                        <div class="card-body">

                            <form class="forms-sample" name="form_index" method="post">

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Razão Social <span class="text-danger" data-toggle="tooltip" data-placement="bottom" title=""></span></label>
                                        <input type="text" class="form-control" name="sistema_razao_social" value="<?= (isset($sistema) ? $sistema->sistema_razao_social : set_value('sistema_razao_social')) ?>">
                                        <?= form_error('sistema_razao_social', '<div class="text-danger"> ', '</div>') ?>
                                    </div>
                                    <div class="col-md-6 mb-20">
                                        <label>Nome Fantasia <span class="text-danger" data-toggle="tooltip" data-placement="bottom" title=""></span></label>
                                        <input type="text" class="form-control" name="sistema_nome_fantasia" value="<?= (isset($sistema) ? $sistema->sistema_nome_fantasia : set_value('sistema_nome_fantasia')) ?>">
                                        <?= form_error('sistema_nome_fantasia', '<div class="text-danger"> ', '</div>') ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label>CNPJ <span class="text-danger" data-toggle="tooltip" data-placement="bottom" title=""></label>
                                        <input type="text" class="form-control cnpj" name="sistema_cnpj" value="<?= (isset($sistema) ? $sistema->sistema_cnpj : set_value('sistema_cnpj')) ?>">
                                        <?= form_error('sistema_cnpj', '<div class="text-danger"> ', '</div>') ?>
                                    </div>
                                    <div class="col-md-3 mb-20">
                                        <label>Inscrição Estadual <span class="text-danger" data-toggle="tooltip" data-placement="bottom" title=""></span></label>
                                        <input type="text" class="form-control" name="sistema_ie" value="<?= (isset($sistema) ? $sistema->sistema_ie : set_value('sistema_ie')) ?>">
                                        <?= form_error('sistema_ie', '<div class="text-danger"> ', '</div>') ?>
                                    </div>
                                    <div class="col-md-3 mb-20">
                                        <label>Telefone Fixo</label>
                                        <input type="text" class="form-control phone_with_ddd" name="sistema_telefone_fixo" value="<?= (isset($sistema) ? $sistema->sistema_telefone_fixo : set_value('sistema_telefone_fixo')) ?>">
                                        <?= form_error('sistema_telefone_fixo', '<div class="text-danger"> ', '</div>') ?>
                                    </div>
                                    <div class="col-md-3 mb-20">
                                        <label>Telefone Móvel</label>
                                        <input type="text" class="form-control sp_celphones" name="sistema_telefone_movel" value="<?= (isset($sistema) ? $sistema->sistema_telefone_movel : set_value('sistema_telefone_movel')) ?>">
                                        <?= form_error('sistema_telefone_movel', '<div class="text-danger"> ', '</div>') ?>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Email <span class="text-danger" data-toggle="tooltip" data-placement="bottom" title=""></span></label>
                                        <input type="email" class="form-control" name="sistema_email" value="<?= (isset($sistema) ? $sistema->sistema_email : set_value('sistema_email')) ?>">
                                        <?= form_error('sistema_email', '<div class="text-danger"> ', '</div>') ?>
                                    </div>
                                    <div class="col-md-6 mb-20">
                                        <label>URL Site <span class="text-danger" data-toggle="tooltip" data-placement="bottom" title=""></span></label>
                                        <input type="text" class="form-control" name="sistema_site_url" value="<?= (isset($sistema) ? $sistema->sistema_site_url : set_value('sistema_site_url')) ?>">
                                        <?= form_error('sistema_site_url', '<div class="text-danger"> ', '</div>') ?>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4 mb-20">
                                        <label>CEP</label>
                                        <input type="text" class="form-control cep" name="sistema_cep" value="<?= (isset($sistema) ? $sistema->sistema_cep : set_value('sistema_cep')) ?>">
                                        <?= form_error('sistema_cep', '<div class="text-danger"> ', '</div>') ?>
                                    </div>
                                    <div class="col-md-4 mb-20">
                                        <label>Endereço</label>
                                        <input type="text" class="form-control" name="sistema_endereco" value="<?= (isset($sistema) ? $sistema->sistema_endereco : set_value('sistema_endereco')) ?>">
                                        <?= form_error('sistema_endereco', '<div class="text-danger"> ', '</div>') ?>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Número <span class="text-danger" data-toggle="tooltip" data-placement="bottom" title=""></span></label>
                                        <input type="text" class="form-control" name="sistema_numero" value="<?= (isset($sistema) ? $sistema->sistema_numero : set_value('sistema_numero')) ?>">
                                        <?= form_error('sistema_numero', '<div class="text-danger"> ', '</div>') ?>
                                    </div>
                                    <div class="col-md-2 mb-20">
                                        <label>Estado</label>
                                        <input type="text" class="form-control uf" name="sistema_estado" value="<?= (isset($sistema) ? $sistema->sistema_estado : set_value('sistema_estado')) ?>">
                                        <?= form_error('sistema_estado', '<div class="text-danger"> ', '</div>') ?>
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-md-6 mb-20">
                                        <label>Cidade <span class="text-danger" data-toggle="tooltip" data-placement="bottom" title=""></span></label>
                                        <input type="text" class="form-control" name="sistema_cidade" value="<?= (isset($sistema) ? $sistema->sistema_cidade : set_value('sistema_cidade')) ?>">
                                        <?= form_error('sistema_cidade', '<div class="text-danger"> ', '</div>') ?>
                                    </div>

                                    <div class="col-md-6 mb-20">
                                        <label>Ponto de Referência</label>
                                        <input type="text" class="form-control" name="sistema_referencia" value="<?= (isset($sistema) ? $sistema->sistema_referencia : set_value('sistema_referencia')) ?>">
                                        <?= form_error('sistema_referencia', '<div class="text-danger"> ', '</div>') ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12 mb-20">
                                        <label>Ordem de Serviço <span class="text-danger" data-toggle="tooltip" data-placement="bottom" title=""></span></label>
                                        <input type="text" class="form-control" name="sistema_txt_ordem_servico" value="<?= (isset($sistema) ? $sistema->sistema_txt_ordem_servico : set_value('sistema_txt_ordem_servico')) ?>">
                                        <?= form_error('sistema_txt_ordem_servico', '<div class="text-danger"> ', '</div>') ?>
                                    </div>
                                </div>

                                <!-- <div class="form-group row">
                                    <div class="col-md-4">
                                        <label>Empresa</label>
                                        <input type="text" class="form-control" name="company" value="<?= (isset($sistema) ? $sistema->company : set_value('company')) ?>">
                                    </div>
                                    
                                    <div class="col-md-4 mb-20">
                                        <label>Perfil de Usuário</label>
                                        <select class="form-control" name="perfil">
                                            <?php if (isset($sistema)) : ?>
                                                <option value="2" <?= ($perfil_usuario->id == 2 ? 'selected' : '') ?>>Suporte</option>
                                                <option value="1" <?= ($perfil_usuario->id == 1 ? 'selected' : '') ?>>Administrador</option>
                                            <?php else : ?>
                                                <option value="2">Suporte</option>
                                                <option value="1">Administrador</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-20">
                                        <label>Ativo</label>
                                        <select class="form-control" name="active">
                                            <?php if (isset($sistema)) : ?>
                                                <option value="0" <?= ($sistema->active == 0 ? 'selected' : '') ?>>Não</option>
                                                <option value="1" <?= ($sistema->active == 1 ? 'selected' : '') ?>>Sim</option>
                                            <?php else : ?>
                                                <option value="0">Não</option>
                                                <option value="1">Sim</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div> -->

                                <!-- <?php if (isset($sistema)) : ?>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <input type="hidden" class="form-control" name="usuario_id" value="<?= $sistema->id; ?>">
                                        </div>
                                    </div>
                                <?php endif; ?> -->

                                <button type="submit" class="btn btn-primary mr-2">Salvar</button>
                                <button class="btn btn-white"><a href="<?= base_url('') ?>home">Cancelar</a></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="w-100 clearfix">
            <span class="text-center text-sm-left d-md-inline-block">Copyright © <?= date('Y') ?> Steamo. All Rights Reserved.</span>
            <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Created <i class="fa-solid fa-code"></i> by <a href="https://github.com/sartervitor" class="text-dark" target="_blank">Sarter</a></span>
        </div>
    </footer>

</div>