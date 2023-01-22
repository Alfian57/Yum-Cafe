@extends('layouts.employee')

@section('content')
    <div class="row">
        <!-- kasir -->
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-body py-4">
                    <form method="POST">
                        <div class="form-group row mb-0">
                            <label class="col-sm-4 col-form-label col-form-label-sm"><b>Tgl.
                                    Transaksi</b></label>
                            <div class="col-sm-8 mb-2">
                                <input type="text" class="form-control form-control-sm" name="tgl_input"
                                    value="<?php echo date('j F Y'); ?>" readonly>
                            </div>
                            <label class="col-sm-4 col-form-label col-form-label-sm"><b>Kode
                                    Barang</b></label>
                            <div class="col-sm-8 mb-2">
                                <div class="input-group">
                                    <input type="text" name="kode_barang"
                                        class="form-control form-control-sm border-right-0" list="datalist1"
                                        onchange="changeValue(this.value)" aria-describedby="basic-addon2" required>
                                    <datalist id="datalist1">
                                    </datalist>
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-white border-left-0" id="basic-addon2"
                                            style="border-radius:0px 15px 15px 0px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                fill="currentColor" class="bi bi-upc-scan" viewBox="0 0 16 16">
                                                <path
                                                    d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5zM3 4.5a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-7zm3 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7z" />
                                            </svg></span>
                                    </div>
                                </div>
                            </div>
                            <label class="col-sm-4 col-form-label col-form-label-sm"><b>Nama
                                    Barang</b></label>
                            <div class="col-sm-8 mb-2">
                                <input type="text" class="form-control form-control-sm" name="nama_barang"
                                    id="nama_barang" readonly>
                            </div>
                            <label class="col-sm-4 col-form-label col-form-label-sm"><b>Harga</b></label>
                            <div class="col-sm-8 mb-2">
                                <input type="number" class="form-control form-control-sm" id="harga_barang"
                                    onchange="total()" value="Harga Barang" name="harga_barang" readonly>
                            </div>
                            <label class="col-sm-4 col-form-label col-form-label-sm"><b>Quantity</b></label>
                            <div class="col-sm-8 mb-2">
                                <input type="number" class="form-control form-control-sm" id="quantity" onchange="total()"
                                    name="quantity" placeholder="0" required>
                            </div>
                            <label class="col-sm-4 col-form-label col-form-label-sm"><b>Sub-Total</b></label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm" id="subtotal"
                                        name="subtotal" onchange="total()" name="sub_total" readonly>
                                    <div class="input-group-append">
                                        <button class="btn btn-purple btn-sm" name="save" value="simpan" type="submit">
                                            <i class="fa fa-plus mr-2"></i>Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <hr>

                    <form method="POST">
                        <div class="form-group row mb-0">
                            <input type="hidden" class="form-control" name="no_transaksi" value="Kode Keranjang" readonly>
                            <input type="hidden" class="form-control" value="Total Bayar" id="hargatotal" readonly>
                            <label class="col-sm-4 col-form-label col-form-label-sm"><b>Bayar</b></label>
                            <div class="col-sm-8 mb-2">
                                <input type="number" class="form-control form-control-sm" name="bayar" id="bayarnya"
                                    onchange="totalnya()">
                            </div>
                            <label class="col-sm-4 col-form-label col-form-label-sm"><b>Kembali</b></label>
                            <div class="col-sm-8 mb-2">
                                <input type="number" class="form-control form-control-sm" name="kembalian" id="total1"
                                    readonly>
                            </div>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-purple btn-sm" name="save1" value="simpan" type="submit">
                                <i class="fa fa-shopping-cart mr-2"></i>Bayar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end kasir -->

        <!-- tes -->
        <div class="col-md-6 mb-3">
            <div class="card" id="print">
                <div class="card-header bg-white border-0 pb-0 pt-4">
                    <h5 class='card-tittle mb-0 text-center'><b>Nama Toko</b></h5>
                    <div class="row">
                        <div class="col-8 col-sm-9 pr-0">
                            <ul class="pl-0 small" style="list-style: none;text-transform: uppercase;">
                                <li>NOTA : no_transaksi</li>
                                <li>KASIR : User</li>
                            </ul>
                        </div>
                        <div class="col-4 col-sm-3 pl-0">
                            <ul class="pl-0 small" style="list-style: none;">
                                <li>TGL : <?php echo date('j-m-Y'); ?></li>
                                <li>JAM : <?php echo date('G:i:s'); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body small pt-0">
                    <hr class="mt-0">
                    <div class="row">
                        <div class="col-5 pr-0">
                            <span><b>Nama Barang</b></span>
                        </div>
                        <div class="col-1 px-0 text-center">
                            <span><b>Qty</b></span>
                        </div>
                        <div class="col-3 px-0 text-right">
                            <span><b>Harga</b></span>
                        </div>
                        <div class="col-3 pl-0 text-right">
                            <span><b>Subtotal</b></span>
                        </div>
                        <div class="col-12">
                            <hr class="mt-2">
                        </div>
                        <div class="col-5 pr-0">
                            <a href="#" onclick="javascript:return confirm('Hapus Data Barang ?');"
                                style="text-decoration:none;">
                                <i class="fa fa-times fa-xs text-danger mr-1"></i>
                                <span class="text-dark">Nama Barang</span>
                            </a>
                        </div>
                        <div class="col-1 px-0 text-center">
                            <span>qty</span>
                        </div>
                        <div class="col-3 px-0 text-right">
                            <span>5345543</span>
                        </div>
                        <div class="col-3 pl-0 text-right">
                            <span>4324324</span>
                        </div>
                        <div class="col-12">
                            <hr class="mt-2">
                            <ul class="list-group border-0">
                                <li class="list-group-item p-0 border-0 d-flex justify-content-between align-items-center">
                                    <b>Total</b>
                                    <span><b>345345</b></span>
                                </li>
                                <li class="list-group-item p-0 border-0 d-flex justify-content-between align-items-center">
                                    <b>Bayar</b>
                                    <span><b>234234</b></span>
                                </li>
                                <li class="list-group-item p-0 border-0 d-flex justify-content-between align-items-center">
                                    <b>Kembalian</b>
                                    <span><b>5000</b></span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-12 mt-3 text-center">
                            <p>* TERIMA KASIH TELAH BERBELANJA*</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-right mt-3">
                <form method="POST">
                    <button class="btn btn-purple-light btn-sm mr-2" onclick="printContent('print')"><i
                            class="fa fa-print mr-1"></i> Print</button>
                    <button class="btn btn-purple btn-sm" name="selesai" type="submit"><i class="fa fa-check mr-1"></i>
                        Selesai</button>
                </form>
            </div>
        </div>
        <!-- end tes -->

    </div><!-- end row col-md-9 -->
@endsection
