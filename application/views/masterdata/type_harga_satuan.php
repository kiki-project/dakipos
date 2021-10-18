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
<a href="#" class="btn btn-sm btn-primary" onclick="add_satuan('<?php echo $id; ?>')">Tambah satuan</a>
<a href="#" class="btn btn-sm btn-danger">Hapus satuan</a>
<script>
    function add_satuan(a){
        $.ajax({
            type: "POST",    
            data: { item_id: a },
            url: base_url("json/add-unit-price"),
            success: function (result) {
                get_price_units(a)
            },
        });
    }
    function get_price_units(a){
        $.ajax({
            type: "POST",    
            data: { item_id: a },
            url: base_url("json/get-unit-price"),
            success: function (response) {            
                result = JSON.parse(response);
                var data = "";
                $.each(result, function (i, row) {
                    data += '<tr>';
                    data += '<td>'+(parseInt(i)+parseInt(1))+'</td>';
                    data += '<td>'+row["satuan"]+'</td>';
                    data += '<td>'+row["jenis_satuan"]+'</td>';
                    data += '<td>'+row["konversi"]+'</td>';
                    data += '<td>'+row["barcode"]+'</td>';
                    data += '<td>'+row["poin"]+'</td>';
                    data += '<td>'+row["komisi"]+'</td>';
                    data += '<td>'+row["harga_pokok"]+'</td>';
                    data += '<td>'+row["proc"]+'</td>';
                    data += '<td>'+row["harga_jual"]+'</td>';
                    data += '</tr>';
                });
                $("#tbl-satuan_harga").html(data);
            },
        });
    }
</script>