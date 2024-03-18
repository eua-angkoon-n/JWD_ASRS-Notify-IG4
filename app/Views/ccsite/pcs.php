<div class="col-sm-12 col-md-12 mb-1" id="dashboard-content">
        <div class="pt-1 pb-1 col-sm-12 text-center">
            <h2><strong>Error AS/RS <?= $data['date'] ?></strong></h2>
        </div>
        <div class="pt-1 pb-1 col-sm-12 ">
            <h2><strong><u><?= $data['b8']['title']?></u></strong></h2>
        </div>
        <div class="row pt-1 pb-1">
            <div class="col-sm-12 col-md-12">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3 id="err_total"><?= $data['b8']['total'] ?></h3>

                        <p>Error Log Total</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3 id="err_crane"><?= $data['b8']['crane'] ?></h3>

                        <p>Crane Error Log</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-truck-loading"></i>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3 id="err_conveyor"><?= $data['b8']['conveyor'] ?></h3>

                        <p>Conveyor Error Log</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-sliders-h"></i>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3 id="err_stv"><?= $data['b8']['stv'] ?></h3>

                        <p>STV Error Log</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-pallet"></i> 
                    </div>
                </div>
            </div>
        </div>

        <div class="row pt-1 pb-1 col-sm-12">
            <h2><strong><u><?= $data['b9']['title']?></u></strong></h2>
        </div>
        <div class="row pt-1 pb-1">
            <div class="col-sm-12 col-md-12">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3 id="err_total"><?= $data['b9']['total'] ?></h3>

                        <p>Error Log Total</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3 id="err_crane"><?= $data['b9']['crane'] ?></h3>

                        <p>Crane Error Log</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-truck-loading"></i>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3 id="err_conveyor"><?= $data['b9']['conveyor'] ?></h3>

                        <p>Conveyor Error Log</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-sliders-h"></i>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3 id="err_stv"><?= $data['b9']['stv'] ?></h3>

                        <p>STV Error Log</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-pallet"></i> 
                    </div>
                </div>
            </div>
        </div>

        <div class="row pt-1 pb-1 col-sm-12">
            <h2><strong><u><?= $data['pacm']['title']?></u></strong></h2>
        </div>
        <div class="row pt-1 pb-1">
            <div class="col-sm-12 col-md-12">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3 id="err_total"><?= $data['pacm']['total'] ?></h3>

                        <p>Error Log Total</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3 id="err_crane"><?= $data['pacm']['crane'] ?></h3>

                        <p>Crane Error Log</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-truck-loading"></i>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3 id="err_conveyor"><?= $data['pacm']['conveyor'] ?></h3>

                        <p>Conveyor Error Log</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-sliders-h"></i>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3 id="err_stv"><?= $data['pacm']['stv'] ?></h3>

                        <p>STV Error Log</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-pallet"></i> 
                    </div>
                </div>
            </div>
        </div>

        <div class="row pt-1 pb-1 col-sm-12">
            <h2><strong><u><?= $data['pact']['title']?></u></strong></h2>
        </div>
        <div class="row pt-1 pb-1">
            <div class="col-sm-12 col-md-12">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3 id="err_total"><?= $data['pact']['total'] ?></h3>

                        <p>Error Log Total</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3 id="err_crane"><?= $data['pact']['crane'] ?></h3>

                        <p>Crane Error Log</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-truck-loading"></i>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3 id="err_conveyor"><?= $data['pact']['conveyor'] ?></h3>

                        <p>Conveyor Error Log</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-sliders-h"></i>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3 id="err_stv"><?= $data['pact']['stv'] ?></h3>

                        <p>STV Error Log</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-pallet"></i> 
                    </div>
                </div>
            </div>
        </div>
</div>