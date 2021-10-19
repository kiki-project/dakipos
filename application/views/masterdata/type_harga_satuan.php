<table class="table table-bordered table-stripped">
    <thead>
        <tr>
            <th>No</th>
            <th style="width:150px;">Satuan</th>
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
                    data += '<td>'
                    data += '<select class="form-control price-unit" name="price_units"">'
                    data += '</select>'
                    data += '</td>';
                    data += '<td>'+row["jenis_satuan"]+'</td>';
                    data += '<td style="text-align:right;">'
                    if(row["jenis_satuan"] == "Konversi"){
                    data += '<input type="text" class="form-control" value="'+row["konversi"]+'" id="'+row['konversi']+row["id"]+'" oninput="set_currency_value("'+row["konversi"]+row["id"]+'", this.value)" style="text-align:right;">'
                    }else{
                    data += '<input type="text" class="form-control" value="'+row["konversi"]+'" readonly style="text-align:right;">'
                    }
                    data += '</td>';
                    data += '<td><input type="text" class="form-control" value="'+row["barcode"]+'"></td>';
                    data += '<td><input type="text" class="form-control" value="'+row["poin"]+'" style="text-align:right;"></td>';
                    data += '<td><input type="text" class="form-control" value="'+row["komisi"]+'" style="text-align:right;"></td>';
                    data += '<td><input type="text" class="form-control" value="'+row["harga_pokok"]+'" style="text-align:right;"></td>';
                    data += '<td><input type="text" class="form-control" value="'+row["proc"]+'" style="text-align:right;"></td>';
                    data += '<td><input type="text" class="form-control" value="'+row["harga_jual"]+'" style="text-align:right;"></td>';
                    data += '</tr>';
                });
                $("#tbl-satuan_harga").html(data);
            },
        });
    }
</script>