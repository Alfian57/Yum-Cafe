$(document).ready(function () {
    $("#table").DataTable({
        dom: "Bfrtip",
        buttons: ["copy", "csv", "excel", "pdf", "print"],
    });
});
$(document).ready(function () {
    $("#table_barang").DataTable({});
});

function changeValue(id_barang) {
    document.getElementById("nama_barang").value =
        nama_barang[id_barang].nama_barang;
    document.getElementById("harga_barang").value =
        harga_barang[id_barang].harga_barang;
}

function total() {
    var harga = parseInt(document.getElementById("harga_barang").value);
    var jumlah_beli = parseInt(document.getElementById("quantity").value);
    var jumlah_harga = harga * jumlah_beli;
    document.getElementById("subtotal").value = jumlah_harga;
}

function totalnya() {
    var harga = parseInt(document.getElementById("hargatotal").value);
    var pembayaran = parseInt(document.getElementById("bayarnya").value);
    var kembali = pembayaran - harga;
    document.getElementById("total1").value = kembali;
}

function printContent(print) {
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(print).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
}
