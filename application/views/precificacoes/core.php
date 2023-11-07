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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <?= isset($precificacoes->data_ultima_alteracao) ? '<i class="ik ik-calendar"></i>&nbsp;Data da última alteração: ' . formata_data_banco_com_hora($precificacoes->data_ultima_alteracao) : '' ?>
                        </div>
                        <div class="card-body">

                            <form class="forms-sample" name="form_core" method="post">

                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label>Categoria </label>
                                        <input type="text" class="form-control" name="precificacao_categoria" value="<?= (isset($precificacoes) ? $precificacoes->precificacao_categoria : set_value('precificacao_categoria')) ?>">
                                        <?= form_error('precificacao_categoria', '<div class="text-danger"> ', '</div>') ?>
                                    </div>
                                    <div class="col-md-2 mb-20">
                                        <label>Valor Hora </label>
                                        <input type="text" class="form-control" name="precificacao_valor_hora" value="<?= (isset($precificacoes) ? $precificacoes->precificacao_valor_hora : set_value('precificacao_valor_hora')) ?>">
                                        <?= form_error('precificacao_valor_hora', '<div class="text-danger"> ', '</div>') ?>
                                    </div>
                                    <div class="col-md-2 mb-20">
                                        <label>Valor Hora </label>
                                        <input type="text" class="form-control" name="precificacao_valor_mensalidade" value="<?= (isset($precificacoes) ? $precificacoes->precificacao_valor_mensalidade : set_value('precificacao_valor_mensalidade')) ?>">
                                        <?= form_error('precificacao_valor_mensalidade', '<div class="text-danger"> ', '</div>') ?>
                                    </div>
                                    <div class="col-md-2 mb-20">
                                        <label>Número de Vagas </label>
                                        <input type="number" class="form-control" name="precificacao_numero_vagas" value="<?= (isset($precificacoes) ? $precificacoes->precificacao_numero_vagas : set_value('precificacao_numero_vagas')) ?>">
                                        <?= form_error('precificacao_numero_vagas', '<div class="text-danger"> ', '</div>') ?>
                                    </div>
                                    <div class="col-md-2 mb-20">
                                        <label>Perfil de Usuário</label>
                                        <select class="form-control" name="perfil">
                                            <?php if (isset($precificacoes)) : ?>
                                                <option value="0" <?= ($precificacoes->precificacao_ativa == 0 ? 'selected' : '') ?>>Não</option>
                                                <option value="1" <?= ($precificacoes->precificacao_ativa == 1 ? 'selected' : '') ?>>Sim</option>
                                            <?php else : ?>
                                                <option value="0">Não</option>
                                                <option value="1">Sim</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                                

                            
                                <?php if (isset($precificacoes)) : ?>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <input type="hidden" class="form-control" name="precificacao_id" value="<?= $precificacoes->precificacao_id; ?>">
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <button type="submit" class="btn btn-primary mr-2">Salvar</button>
                                <button class="btn btn-white"><a href="<?= base_url('') ?>precificacoes">Cancelar</a></button>
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