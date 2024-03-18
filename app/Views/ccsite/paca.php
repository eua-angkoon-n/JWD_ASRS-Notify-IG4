<div class="col-sm-12 col-md-12 mb-1" id="dashboard-content">
        <div class="pt-1 pb-1 col-sm-12 text-center">
            <h2><strong>Error AS/RS <?= $data['date'] ?></strong></h2>
        </div>
        <div class="pt-1 pb-1 col-sm-12 ">
            <h2><strong><u><?= $data['frozen']['title']?></u></strong></h2>
        </div>
        <div class="row pt-1 pb-1">
            <div class="col-sm-12 col-md-12">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3 id="err_total"><?= $data['frozen']['total'] ?></h3>

                        <p>Error Log Total</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3 id="err_crane"><?= $data['frozen']['crane'] ?></h3>

                        <p>Crane Error Log</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-truck-loading"></i>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3 id="err_conveyor"><?= $data['frozen']['conveyor'] ?></h3>

                        <p>Conveyor Error Log</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-sliders-h"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row pt-1 pb-1 col-sm-12">
            <h2><strong><u><?= $data['temp']['title']?></u></strong></h2>
        </div>
        <div class="row pt-1 pb-1">
            <div class="col-sm-12 col-md-12">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3 id="err_total"><?= $data['temp']['total'] ?></h3>

                        <p>Error Log Total</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3 id="err_crane"><?= $data['temp']['crane'] ?></h3>

                        <p>Crane Error Log</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-truck-loading"></i>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3 id="err_conveyor"><?= $data['temp']['conveyor'] ?></h3>

                        <p>Conveyor Error Log</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-sliders-h"></i>
                    </div>
                </div>
            </div>
        </div>
</div>