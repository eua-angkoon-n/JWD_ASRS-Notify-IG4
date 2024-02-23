<div class="col-sm-12 col-md-5 mb-1" id="dashboard-content">
        <div class="row pt-1 pb-1 col-sm-12">
            <h3><strong>Error AS/RS <?= $title." ".$count['date'] ?></strong></h3>
        </div>
        <div class="row pt-1 pb-1">
            <div class="col-sm-12 col-md-12">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3 id="err_total"><?= $count['total'] ?></h3>

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
                        <h3 id="err_crane"><?= $count['crane'] ?></h3>

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
                        <h3 id="err_conveyor"><?= $count['conveyor'] ?></h3>

                        <p>Conveyor Error Log</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-sliders-h"></i>
                    </div>
                </div>
            </div>
        </div>
</div>