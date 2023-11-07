            <?php $this->load->view('layout/navbar') ?>

            <div class="page-wrap">

                <?php $this->load->view('layout/sidebar') ?>

                <div class="main-content">
                    <div class="container-fluid">
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
                        <h1 class="display-1">Teste</h1>
                        <h1 class="display-4 text-danger"></h1>

                    </div>
                </div>

                <footer class="footer">
                    <div class="w-100 clearfix">
                        <span class="text-center text-sm-left d-md-inline-block">Copyright © <?= date('Y') ?> Steamo. All Rights Reserved.</span>
                        <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Created <i class="fa-solid fa-code"></i> by <a href="https://github.com/sartervitor" class="text-dark" target="_blank">Sarter</a></span>
                    </div>
                </footer>

            </div>