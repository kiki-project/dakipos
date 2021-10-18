<table class="table table-bordered table-stripped">
    <thead>
        <tr>
            <th>No</th>
            <th>Satuan</th>
            <th>Jns Satuan</th>
            <th>Jml Konversi</th>
            <th>Barcode</th>
            <th>Poin</th>
            <th>Komisi</th>
            <th>Harga Pokok</th>
            <th>Proc (%)</th>
            <th>Harga Jual</th>
        </tr>
    </thead>
    <tbody id="tbl-satuan_harga"></tbody>
</table>
<button class="btn btn-sm btn-primary" onclick="add_satuan('<?php echo $id; ?>')">Tambah satuan</button>
<button class="btn btn-sm btn-danger">Hapus satuan</button>
<script>
    function add_satuan(){
        $.ajax({
            type: "GET",
            url: base_url("json/add-unit-price"),
            success: function (result) {
                
            },
        });
    }
</script>