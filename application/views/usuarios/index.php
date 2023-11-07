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
                                        <a title="Home" href="<?= base_url('') ?>home"><i class="ik ik-home"></i></a>
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

                <?php if ($message = $this->session->flashdata('error')) : ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert bg-danger alert-danger text-white alert-dismissible fade show" role="alert">
                                <strong><i class="fa-solid fa-warning fa-beat"></i> <?= $message ?></strong>
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
                            <div class="card-header d-block">
                                <a data-toggle="tooltip" data-placement="bottom" title="Novo Usuário" href="<?= base_url($this->router->fetch_class() . '/core/') ?>" class="btn btn-info float-right"><i class="fa-solid fa-user-plus"></i> Novo Usuário</a>
                            </div>
                            <div class="card-body">
                                <table class="table data-table">
                                    <thead>
                                        <tr>
                                            <th>Usuario</th>
                                            <th>Email</th>
                                            <th>Nome</th>
                                            <th>Sobrenome</th>
                                            <th>Telefone</th>
                                            <th>Empresa</th>
                                            <th>Perfil de Usuário</th>
                                            <th>Ativo</th>
                                            <th class="nosort text-right pr-30">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($usuarios as $user) : ?>
                                            <tr>
                                                <td><?= $user->username; ?></td>
                                                <td><?= $user->email; ?></td>
                                                <td><?= $user->first_name; ?></td>
                                                <td><?= $user->last_name; ?></td>
                                                <td><?= $user->phone; ?></td>
                                                <td><?= $user->company; ?></td>
                                                <td><?= ($this->ion_auth->is_admin($user->id) ? 'Administrador' : 'Suporte'); ?></td>
                                                <td><?= ($user->active == 1 ? '<span class="badge badge-pill badge-success mb-1"><i class="fa-solid fa-lock-open"></i>&nbsp;Sim</span>' : '<span class="badge badge-pill badge-info mb-1"><i class="fa-solid fa-lock"></i>&nbsp;Não</span>'); ?></td>
                                                <td class="text-right">
                                                    <a data-toggle="tooltip" data-placement="bottom" title="Editar <?= $this->router->fetch_class(); ?>" href="<?= base_url('usuarios/core/' . $user->id); ?>" class="btn btn-icon btn-primary "><i class="fa-solid fa-pen-to-square"></i></a>
                                                    &nbsp
                                                    <button type="button" title="Excluir <?= $this->router->fetch_class(); ?>" href="" class="btn btn-icon btn-danger" data-toggle="modal" data-target="#user-<?= $user->id ?>"><i class="fa-solid fa-trash"></i></button>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="user-<?= $user->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalCenterLabel">Excluir Registro?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <i class="fa-solid fa-triangle-exclamation"></i> Tem certeza de que deseja excluir o registro selecionado?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Não, voltar.</button>
                                                            <a data-toggle="tooltip" data-placement="bottom" href="<?= base_url('usuarios/del/' . $user->id); ?>" class="btn btn-danger ">Sim, excluir.</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
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