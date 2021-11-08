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
            <th>Jumlah1</th>
            <th>Jumlah2</th>
            <th>Jumlah3</th>
            <th>Proc1 (%)</th>
            <th>Proc2 (%)</th>
            <th>Proc3 (%)</th>
            <th>HJ Level 1</th>
            <th>HJ Level 2</th>
            <th>HJ Level 3</th>
        </tr>
    </thead>
    <tbody id="tbl-jumlah_harga"></tbody>
</table>
</div>
<a href="#" id="btn-add_satuan_jumlah" class="btn btn-sm btn-primary" onclick="add_satuan_jumlah('<?php echo $id; ?>')"><i class="fa fa-plus"></i> Tambah satuan</a>
<a href="#" id="btn-refresh_jumlah" class="btn btn-sm btn-success" onclick="get_price_jumlah('<?php echo $id; ?>')"><i class="fa fa-refresh"></i> Refresh tabel</a>

<script>
    function add_satuan_jumlah(a){
        $("#btn-add_satuan_jumlah").html('Menyiapkan data ..');
        $.ajax({
            type: "POST",    
            data: { item_id: a },
            url: base_url("json/add-unit-price"),
            success: function (result) {
                get_price_jumlah(a)
                $("#btn-add_satuan_jumlah").html('Tambah satuan');
            },
        });
    }
    function get_price_jumlah(a){
        $.ajax({
            type: "POST",    
            data: { item_id: a },
            url: base_url("json/get-unit-price"),
            success: function (response) {            
                result = JSON.parse(response);
                var data = "";
                $.each(result, function (i, row) {
                    get_units_select_price_type('jumlah'+row['id'], row['satuan'])
                    data += '<tr>';
                    data += '<td>'+(parseInt(i)+parseInt(1))+'</td>';
                    data += '<td>';
                    data += '<select class="form-price price-unit" id="jumlah'+row['id']+'" name="price_units"">';
                    data += '</select>';
                    data += '</td>';
                    data += '<td>'+row["jenis_satuan"]+'</td>';
                    data += '<td style="text-align:right;">';
                    if(row["jenis_satuan"] == "Konversi"){
                    data += '<input type="text" class="form-price" value="'+currency(row["konversi"]).format().replace("$", "")+'" id="'+3001+row["id"]+'" oninput="currency_price_level('+row['id']+','+3001+', this.value)" style="text-align:right;">';
                    }else{
                    data += '<input type="text" class="form-price" value="'+currency(row["konversi"]).format().replace("$", "")+'" id="'+3001+row["id"]+'" readonly style="text-align:right;">';
                    }
                    data += '</td>';
                    data += '<td><input type="text" class="form-price" id="bar'+row['id']+'" value="'+row["barcode"]+'"></td>';
                    data += '<td><input type="text" class="form-price" value="'+currency(row["poin"]).format().replace("$", "")+'" id="'+3002+row["id"]+'" oninput="currency_price_level('+row['id']+','+3002+', this.value)" style="text-align:right;"></td>';
                    data += '<td><input type="text" class="form-price" value="'+currency(row["komisi"]).format().replace("$", "")+'" id="'+3003+row["id"]+'" oninput="currency_price_level('+row['id']+','+3003+', this.value)" style="text-align:right;"></td>';
                    data += '<td><input type="text" class="form-price" value="'+currency(row["harga_pokok"]).format().replace("$", "")+'" id="'+3004+row["id"]+'" oninput="hitung_currency_price_level('+row['id']+','+3004+', this.value)" style="text-align:right;"></td>';
                    data += '<td><input type="text" class="form-price" value="'+currency(row["jumlah"]).format().replace("$", "")+'" id="'+3007+row["id"]+'" oninput="hitung_currency_price_level('+row['id']+','+3007+', this.value)" style="text-align:right;"></td>';
                    data += '<td><input type="text" class="form-price" value="'+currency(row["jumlah2"]).format().replace("$", "")+'" id="'+30072+row["id"]+'" oninput="hitung_currency_price_level('+row['id']+','+30072+', this.value)" style="text-align:right;"></td>';
                    data += '<td><input type="text" class="form-price" value="'+currency(row["jumlah3"]).format().replace("$", "")+'" id="'+30073+row["id"]+'" oninput="hitung_currency_price_level('+row['id']+','+30073+', this.value)" style="text-align:right;"></td>';
                    data += '<td><input type="text" class="form-price" value="'+currency(row["proc"]).format().replace("$", "")+'" id="'+3005+row["id"]+'" oninput="hitung_currency_price_level('+row['id']+','+3005+', this.value)" style="text-align:right;"></td>';
                    data += '<td><input type="text" class="form-price" value="'+currency(row["proc2"]).format().replace("$", "")+'" id="'+30052+row["id"]+'" oninput="hitung_currency_price_level('+row['id']+','+30052+', this.value)" style="text-align:right;"></td>';
                    data += '<td><input type="text" class="form-price" value="'+currency(row["proc3"]).format().replace("$", "")+'" id="'+30053+row["id"]+'" oninput="hitung_currency_price_level('+row['id']+','+30053+', this.value)" style="text-align:right;"></td>';
                    data += '<td><input type="text" class="form-price" value="'+currency(row["harga_jual"]).format().replace("$", "")+'" id="'+3006+row["id"]+'" oninput="hitung_currency_price_level('+row['id']+','+3006+', this.value)"  style="text-align:right;"></td>';
                    data += '<td><input type="text" class="form-price" value="'+currency(row["harga_jual2"]).format().replace("$", "")+'" id="'+30062+row["id"]+'" oninput="hitung_currency_price_level('+row['id']+','+30062+', this.value)"  style="text-align:right;"></td>';
                    data += '<td><input type="text" class="form-price" value="'+currency(row["harga_jual3"]).format().replace("$", "")+'" id="'+30063+row["id"]+'" oninput="hitung_currency_price_level('+row['id']+','+30063+', this.value)"  style="text-align:right;"></td>';
                    data += '<td>';
                    data += '<div class="btn-group" ">';
                    data += '<a href="#" id="btn-save-'+row['id']+'" class="btn btn-sm btn-primary" onclick="save_jumlah_price('+row['id']+')"><i class="fa fa-save"></i></button>';
                    data += '<a href="#" id="btn-delete-'+row['id']+'" class="btn btn-sm btn-danger" onclick="delete_jumlah_price('+row['id']+')"><i class="fa fa-trash"></i></button>';
                    data += '</div>';
                    data += '</td>';
                    data += '</tr>';
                });
                $("#tbl-jumlah_harga").html(data);
            },
        });
    }

    function save_jumlah_price(a){
        var satuan = $("#unit"+a).val();
        var barcode = $("#bar"+a).val();
        var konversi = $("#"+3001+a).val();
        var poin = $("#"+3002+a).val();
        var komisi = $("#"+3003+a).val();
        var harga_pokok = $("#"+3004+a).val();
        var jumlah = $("#"+3007+a).val();
        var jumlah2 = $("#"+30072+a).val();
        var jumlah3 = $("#"+30073+a).val();
        var proc = $("#"+3005+a).val();
        var proc2 = $("#"+30052+a).val();
        var proc3 = $("#"+30053+a).val();
        var harga_jual = $("#"+3006+a).val();
        var harga_jual2 = $("#"+30062+a).val();
        var harga_jual3 = $("#"+30063+a).val();
    
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
                jumlah: jumlah, 
                jumlah2: jumlah2, 
                jumlah3: jumlah3, 
                proc: proc, 
                proc2: proc2, 
                proc3: proc3, 
                harga_jual: harga_jual,
                harga_jual2: harga_jual2,
                harga_jual3: harga_jual3,
                type: 'jumlah'
            },
            success: function (response) {
                console.log(poin)
            $("#btn-save-"+a).html('<i class="fa fa-save"></i>');
             get_price_jumlah('<?php echo $id; ?>')
            },
        });
    }
    function delete_jumlah_price(a){
        if(confirm('Hapus data?')){
            $.ajax({
                type: "POST",
                url: base_url("json/delete-unit-price"),
                data: {id: a },
                success: function (response) {
                get_price_jumlah('<?php echo $id; ?>')
                },
            });
        }
    }
</script>