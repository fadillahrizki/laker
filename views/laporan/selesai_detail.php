<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Laporan */

$this->title = "Laporan Selesai : $model->id";
\yii\web\YiiAsset::register($this);

?>
<div class="laporan-view">

    <div class="card card-style rounded-0">
        <div class="content">
            <h4>Pelapor</h4>
            <p></p>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Rahasiakan data saya</th>
                    <td width="70%"><?=$model->pelapor->is_rahasia?></td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td width="70%"><?=$model->pelapor->nama?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td width="70%"><?=$model->pelapor->alamat?></td>
                </tr>
                <tr>
                    <th>Usia</th>
                    <td width="70%"><?=$model->pelapor->usia?></td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td width="70%"><?=$model->pelapor->jenis_kelamin?></td>
                </tr>
                <tr>
                    <th>Nomor HP</th>
                    <td width="70%"><?=$model->pelapor->nomor_hp?></td>
                </tr>
                <tr>
                    <th>Pelapor adalah korban</th>
                    <td width="70%"><?=$model->pelapor->is_korban?></td>
                </tr>
                <tr>
                    <th>Hubungan dengan korban</th>
                    <td width="70%"><?=$model->pelapor->hubungan_dengan_korban?></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="card card-style rounded-0">
        <div class="content">
            <h4>Korban</h4>
            <p></p>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Nama</th>
                    <td width="70%"><?=$model->korban->nama?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td width="70%"><?=$model->korban->alamat?></td>
                </tr>
                <tr>
                    <th>Usia</th>
                    <td width="70%"><?=$model->korban->usia?></td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td width="70%"><?=$model->korban->jenis_kelamin?></td>
                </tr>
                <tr>
                    <th>Nomor HP</th>
                    <td width="70%"><?=$model->korban->nomor_hp?></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="card card-style rounded-0">
        <div class="content">
            <h4>Terlapor</h4>
            <p></p>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Nama</th>
                    <td width="70%"><?=$model->terlapor->nama?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td width="70%"><?=$model->terlapor->alamat?></td>
                </tr>
                <tr>
                    <th>Usia</th>
                    <td width="70%"><?=$model->terlapor->usia?></td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td width="70%"><?=$model->terlapor->jenis_kelamin?></td>
                </tr>
                <tr>
                    <th>Hubungan Dengan Korban</th>
                    <td width="70%"><?=$model->terlapor->hubungan_dengan_korban?></td>
                </tr>
                <tr>
                    <th>Nomor HP</th>
                    <td width="70%"><?=$model->terlapor->nomor_hp?></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="card card-style rounded-0">
        <div class="content">
            <h4>Kasus</h4>
            <p></p>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Jenis Kasus</th>
                    <td width="70%"><?=$model->jenisKasus->nama?></td>
                </tr>
                <tr>
                    <th>Kronologi Kejadian</th>
                    <td width="70%"><?=$model->kronologi?></td>
                </tr>
                <tr>
                    <th>Penyelesaian</th>
                    <td width="70%"><?=$model->penyelesaian?></td>
                </tr>
            </table>
        </div>
    </div>

    <?php $form = ActiveForm::begin(); ?>

    <div class="container-fluid my-5">
        <button class="btn shadow-xl btn-m bg-highlight font-900">Simpan</button>
    </div>
    <?php ActiveForm::end() ?>

</div>
