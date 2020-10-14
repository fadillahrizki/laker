<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Laporan */

$this->title = "Detail laporan : $model->id";
\yii\web\YiiAsset::register($this);

?>
<div class="laporan-view">

    <div class="card card-style">
        <div class="content">
            <h4>Laporan</h4>
            <p></p>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>ID Laporan</th>
                    <td><?=$model->id?></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td><?=$model->status?></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="card card-style">
        <div class="content">
            <h4>Pelapor</h4>
            <p></p>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Rahasiakan data saya</th>
                    <td><?=$model->pelapor->is_rahasia?></td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td><?=$model->pelapor->nama?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td><?=$model->pelapor->alamat?></td>
                </tr>
                <tr>
                    <th>Usia</th>
                    <td><?=$model->pelapor->usia?></td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td><?=$model->pelapor->jenis_kelamin?></td>
                </tr>
                <tr>
                    <th>Nomor HP</th>
                    <td><?=$model->pelapor->nomor_hp?></td>
                </tr>
                <tr>
                    <th>Pelapor adalah korban</th>
                    <td><?=$model->pelapor->is_korban?></td>
                </tr>
                <tr>
                    <th>Hubungan dengan korban</th>
                    <td><?=$model->pelapor->hubungan_dengan_korban?></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="card card-style">
        <div class="content">
            <h4>Korban</h4>
            <p></p>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Nama</th>
                    <td><?=$model->korban->nama?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td><?=$model->korban->alamat?></td>
                </tr>
                <tr>
                    <th>Usia</th>
                    <td><?=$model->korban->usia?></td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td><?=$model->korban->jenis_kelamin?></td>
                </tr>
                <tr>
                    <th>Nomor HP</th>
                    <td><?=$model->korban->nomor_hp?></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="card card-style">
        <div class="content">
            <h4>Terlapor</h4>
            <p></p>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Nama</th>
                    <td><?=$model->terlapor->nama?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td><?=$model->terlapor->alamat?></td>
                </tr>
                <tr>
                    <th>Usia</th>
                    <td><?=$model->terlapor->usia?></td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td><?=$model->terlapor->jenis_kelamin?></td>
                </tr>
                <tr>
                    <th>Nomor HP</th>
                    <td><?=$model->terlapor->nomor_hp?></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="card card-style">
        <div class="content">
            <h4>Kasus</h4>
            <p></p>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Jenis Kasus</th>
                    <td><?=$model->jenisKasus->nama?></td>
                </tr>
                <tr>
                    <th>Kronologi Kejadian</th>
                    <td><?=$model->kronologi?></td>
                </tr>
            </table>
        </div>
    </div>

</div>
