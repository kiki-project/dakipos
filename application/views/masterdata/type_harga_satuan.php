<div style="overflow:auto;white-space: nowrap;">
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
</div>
<a href="#" id="btn-add_satuan_unit" class="btn btn-sm btn-primary" onclick="add_satuan_unit('<?php echo $id; ?>')"><i class="fa fa-plus"></i> Tambah Satuan</a>
<a href="#" id="btn-refresh_unit" class="btn btn-sm btn-success" onclick="get_price_units('<?php echo $id; ?>')"><i class="fa fa-refresh"></i> Refresh Tabel</a>
<script>
    function add_satuan_unit(a){
        $("#btn-add_satuan_unit").html('Menyiapkan data ..');
        $.ajax({
            type: "POST",    
            data: { item_id: a },
            url: base_url("json/add-unit-price"),
            success: function (result) {
                get_price_units(a)
                $("#btn-add_satuan_unit").html('Tambah Satuan');
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
                    get_units_select_price_type('unit'+row['id'], row['satuan'])
                    data += '<tr>';
                    data += '<td>'+(parseInt(i)+parseInt(1))+'</td>';
                    data += '<td>';
                    data += '<select class="form-price price-unit" id="unit'+row['id']+'" name="price_units"">';
                    data += '</select>';
                    data += '</td>';
                    data += '<td>'+row["jenis_satuan"]+'</td>';
                    data += '<td style="text-align:right;">';
                    if(row["jenis_satuan"] == "Konversi"){
                    data += '<input type="text" class="form-price" value="'+currency(row["konversi"]).format().replace("$", "")+'" id="'+1001+row["id"]+'" oninput="currency_price_units('+row['id']+','+1001+', this.value)" style="text-align:right;">';
                    }else{
                    data += '<input type="text" class="form-price" value="'+currency(row["konversi"]).format().replace("$", "")+'" id="'+1001+row["id"]+'" readonly style="text-align:right;">';
                    }
                    data += '</td>';
                    data += '<td style="text-align:right;"><input type="text" class="form-price" id="bar'+row['id']+'" value="'+row["barcode"]+'"></td>';
                    data += '<td style="text-align:right;"><input type="text" class="form-price" value="'+currency(row["poin"]).format().replace("$", "")+'" id="'+1002+row["id"]+'" oninput="currency_price_units('+row['id']+','+1002+', this.value)" style="text-align:right;"></td>';
                    data += '<td style="text-align:right;"><input type="text" class="form-price" value="'+currency(row["komisi"]).format().replace("$", "")+'" id="'+1003+row["id"]+'" oninput="currency_price_units('+row['id']+','+1003+', this.value)" style="text-align:right;"></td>';
                    data += '<td style="text-align:right;"><input type="text" class="form-price" value="'+currency(row["harga_pokok"]).format().replace("$", "")+'" id="'+1004+row["id"]+'" oninput="hitung_currency_price_units('+row['id']+','+1004+', this.value)" style="text-align:right;"></td>';
                    data += '<td style="text-align:right;"><input type="text" class="form-price" value="'+currency(row["proc"]).format().replace("$", "")+'" id="'+1005+row["id"]+'" oninput="hitung_currency_price_units('+row['id']+','+1005+', this.value)" style="text-align:right;"></td>';
                    data += '<td style="text-align:right;"><input type="text" class="form-price" value="'+currency(row["harga_jual"]).format().replace("$", "")+'" id="'+1006+row["id"]+'" oninput="hitung_currency_price_units('+row['id']+','+1006+', this.value)"  style="text-align:right;"></td>';
                    data += '<td>';
                    data += '<div class="btn-group" ">';
                    data += '<a href="#" id="btn-save-satuan'+row['id']+'" class="btn btn-sm btn-primary" onclick="save_unit_price('+row['id']+')"><i class="fa fa-save"></i></button>';
                    data += '<a href="#" id="btn-delete-satuan'+row['id']+'" class="btn btn-sm btn-danger" onclick="delete_unit_price('+row['id']+')"><i class="fa fa-trash"></i></button>';
                    data += '</div>';
                    data += '</td>';
                    data += '</tr>';
                });
                $("#tbl-satuan_harga").html(data);
            },
        });
    }

    function save_unit_price(a){
        var satuan = $("#unit"+a).val();
        var barcode = $("#bar"+a).val();
        var konversi = $("#"+1001+a).val();
        var poin = $("#"+1002+a).val();
        var komisi = $("#"+1003+a).val();
        var harga_pokok = $("#"+1004+a).val();
        var proc = $("#"+1005+a).val();
        var harga_jual = $("#"+1006+a).val();
    
        $("#btn-save-satuan"+a).html('..');

            $.ajax({
            type: "POST",
            url: base_url("json/update-unit-price/"),
            data: { 
                id: a,
                satuan: satuan, 
                barcode: barcode, 
                konversi: konversi, 
                poin: poin, 
                komisi: komisi, 
                harga_pokok: harga_pokok, 
                proc: proc, 
                harga_jual: harga_jual,
                type: 'satuan'
            },
            success: function (response) {
            var result = JSON.parse(response);
            replace_satu_harga(result)
            $("#btn-save-satuan"+a).html('<i class="fa fa-save"></i>');
             get_price_units('<?php echo $id; ?>')
            },
        });
    }
    function replace_satu_harga(data){
        $("#item-unit").val(data['satuan_dasar']);
        $("#item-poin-dasar").val(currency(data["poin_dasar"]).format().replace("$", ""));
        $("#item-barcode").val(currency(data["barcode"]).format().replace("$", ""));
        $("#item-komisi-sales").val(currency(data["komisi_sales"]).format().replace("$", ""));
        $("#item-harga-pokok").val(currency(data["harga_pokok"]).format().replace("$", ""));
        $("#item-persentase").val(currency(data["persentase"]).format().replace("$", ""));
        $("#item-harga-jual").val(currency(data["harga_jual"]).format().replace("$", ""));

    }
    function delete_unit_price(a){
        if(confirm('Hapus data?')){
            $.ajax({
                type: "POST",
                url: base_url("json/delete-unit-price"),
                data: {id: a },
                success: function (response) {
                get_price_units('<?php echo $id; ?>')
                },
            });
        }
    }
</script>