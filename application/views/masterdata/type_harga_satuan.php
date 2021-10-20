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
                    data += '<input type="text" class="form-price" value="'+currency(row["konversi"]).format().replace("$", "")+'" id="'+1001+row["id"]+'" oninput="set_currency_value('+1001+row['id']+', this.value)" style="text-align:right;">';
                    }else{
                    data += '<input type="text" class="form-price" value="'+currency(row["konversi"]).format().replace("$", "")+'" id="'+1001+row["id"]+'" readonly style="text-align:right;">';
                    }
                    data += '</td>';
                    data += '<td><input type="text" class="form-price" id="bar'+row['id']+'" value="'+row["barcode"]+'"></td>';
                    data += '<td><input type="text" class="form-price" value="'+currency(row["poin"]).format().replace("$", "")+'" id="'+1002+row["id"]+'" oninput="set_currency_value('+1002+row['id']+', this.value)" style="text-align:right;"></td>';
                    data += '<td><input type="text" class="form-price" value="'+currency(row["komisi"]).format().replace("$", "")+'" id="'+1003+row["id"]+'" oninput="set_currency_value('+1003+row['id']+', this.value)" style="text-align:right;"></td>';
                    data += '<td><input type="text" class="form-price" value="'+currency(row["harga_pokok"]).format().replace("$", "")+'" id="'+1004+row["id"]+'" oninput="set_currency_value('+1004+row['id']+', this.value)" style="text-align:right;"></td>';
                    data += '<td><input type="text" class="form-price" value="'+currency(row["proc"]).format().replace("$", "")+'" id="'+1005+row["id"]+'" oninput="set_currency_value('+1005+row['id']+', this.value)" style="text-align:right;"></td>';
                    data += '<td><input type="text" class="form-price" value="'+currency(row["harga_jual"]).format().replace("$", "")+'" id="'+1006+row["id"]+'" oninput="set_currency_value('+1006+row['id']+', this.value)"  style="text-align:right;"></td>';
                    data += '<td>';
                    data += '<div class="btn-group" ">';
                    data += '<a href="#" id="btn-save-'+row['id']+'" class="btn btn-sm btn-primary" onclick="save_unit_price('+row['id']+')">save</button>&nbsp;&nbsp;';
                    data += '<a href="#" id="btn-delete-'+row['id']+'" class="btn btn-sm btn-danger" onclick="delete_unit_price('+row['id']+')"><i class="fa fa-trash"></i></button>';
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
    
        $("#btn-save-"+a).html('..');

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
                harga_jual: harga_jual
            },
            success: function (response) {
                console.log(poin)
            $("#btn-save-"+a).html('save');
             get_price_units('<?php echo $id; ?>')
            },
        });
    }
    function delete_unit_price(a){
            $.ajax({
            type: "POST",
            url: base_url("json/delete-unit-price"),
            data: {id: a },
            success: function (response) {
             get_price_units('<?php echo $id; ?>')
            },
        });
    }
</script>