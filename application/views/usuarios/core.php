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
                                <li class="breadcrumb-item">
                                    <a data-toggle="tooltip" data-placement="bottom" title="<?= $this->router->fetch_class(); ?>" href="<?= base_url($this->router->fetch_class()) ?>">Listar <?= ($this->router->fetch_class()) ?></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <?= isset($usuarios->data_ultima_alteracao) ? '<i class="ik ik-calendar"></i>&nbsp;Data da última alteração: ' . formata_data_banco_com_hora($usuarios->data_ultima_alteracao) : '' ?>
                        </div>
                        <div class="card-body">

                            <form class="forms-sample" name="form_core" method="post">

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Nome <span class="text-danger"data-toggle="tooltip" data-placement="bottom" title="<?= ($campo_obg) ?>">*</span></label>
                                        <input type="text" class="form-control" name="first_name" value="<?= (isset($usuarios) ? $usuarios->first_name : set_value('first_name')) ?>">
                                        <?= form_error('first_name', '<div class="text-danger"> ', '</div>') ?>
                                    </div>
                                    <div class="col-md-6 mb-20">
                                        <label>Sobrenome <span class="text-danger"data-toggle="tooltip" data-placement="bottom" title="<?= ($campo_obg) ?>">*</span></label>
                                        <input type="text" class="form-control" name="last_name" value="<?= (isset($usuarios) ? $usuarios->last_name : set_value('last_name')) ?>">
                                        <?= form_error('last_name', '<div class="text-danger"> ', '</div>') ?>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label>Username <span class="text-danger"data-toggle="tooltip" data-placement="bottom" title="<?= ($campo_obg) ?>">*</span></label>
                                        <input type="text" class="form-control" name="username" value="<?= (isset($usuarios) ? $usuarios->username : set_value('username')) ?>">
                                        <?= form_error('username', '<div class="text-danger"> ', '</div>') ?>
                                    </div>
                                    <div class="col-md-4 mb-20">
                                    <label>Email <span class="text-danger"data-toggle="tooltip" data-placement="bottom" title="<?= ($campo_obg) ?>">*</span></label>
                                        <input type="email" class="form-control" name="email" value="<?= (isset($usuarios) ? $usuarios->email : set_value('email')) ?>">
                                        <?= form_error('email', '<div class="text-danger"> ', '</div>') ?>
                                    </div>
                                    <div class="col-md-4 mb-20">
                                        <label>Telefone</label>
                                        <input type="text" class="form-control sp_celphones" name="phone" value="<?= (isset($usuarios) ? $usuarios->phone : set_value('phone')) ?>">
                                        <?= form_error('phone', '<div class="text-danger"> ', '</div>') ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Senha</label>
                                        <input type="password" class="form-control" name="password"">
                                        <?= form_error('password', '<div class="text-danger"> ', '</div>') ?>
                                    </div>
                                    <div class=" col-md-6 mb-20">
                                        <label>Confirmação de Senha</label>
                                        <input type="password" class="form-control" name="confirmacao">
                                        <?= form_error('confirmacao', '<div class="text-danger"> ', '</div>') ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label>Empresa</label>
                                        <input type="text" class="form-control" name="company" value="<?= (isset($usuarios) ? $usuarios->company : set_value('company')) ?>">
                                    </div>
                                    
                                    <div class="col-md-4 mb-20">
                                        <label>Perfil de Usuário</label>
                                        <select class="form-control" name="perfil">
                                            <?php if (isset($usuarios)) : ?>
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
                                            <?php if (isset($usuarios)) : ?>
                                                <option value="0" <?= ($usuarios->active == 0 ? 'selected' : '') ?>>Não</option>
                                                <option value="1" <?= ($usuarios->active == 1 ? 'selected' : '') ?>>Sim</option>
                                            <?php else : ?>
                                                <option value="0">Não</option>
                                                <option value="1">Sim</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>

                                <?php if (isset($usuarios)) : ?>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <input type="hidden" class="form-control" name="usuario_id" value="<?= $usuarios->id; ?>">
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <button type="submit" class="btn btn-primary mr-2">Salvar</button>
                                <button class="btn btn-white"><a href="<?= base_url('') ?>usuarios/index">Cancelar</a></button>
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