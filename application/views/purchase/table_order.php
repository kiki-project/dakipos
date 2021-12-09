<div style="overflow:auto;white-space: nowrap;height:350px;border:1px solid #ccc;">
<table class="table table-bordered table-stripped">
    <thead>
        <tr>
            <th style="width:20px;">No</th>
            <th style="width:150px;">Kode</th>
            <th>Nama</th>
            <th>Jumlah</th>
            <th>jml Terima</th>
            <th>Satuan</th>
            <th>Harga</th>
            <th>Pot(%)</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody id="tbl-dimensi_harga"></tbody>
</table>
</div>
<a href="#" id="btn-add_item" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-items" onclick="get_item_list_radio(10, '')" ><i class="fa fa-plus"></i> Tambah item</a>
<a href="#" id="btn-refresh_dimensi" class="btn btn-sm btn-success" onclick="get_purchase_item('<?php echo $id; ?>')"><i class="fa fa-refresh"></i> Refresh Tabel</a>

<script>
    function add_satuan_dimensi(a){
        $("#btn-add_satuan_dimensi").html('Menyiapkan data ..');
        $.ajax({
            type: "POST",    
            data: { item_id: a },
            url: base_url("json/add-unit-price"),
            success: function (result) {
                get_purchase_item(a)
                $("#btn-add_satuan_dimensi").html('Tambah satuan');
            },
        });
    }
    function get_purchase_item(a){
        $.ajax({
            type: "POST",    
            data: { purchase_id: a },
            url: base_url("json/get-purchase_item"),
            success: function (response) {            
                result = JSON.parse(response);
                var data = "";
                $.each(result, function (i, row) {
                    get_units_select_price_type('dimensi'+row['id'], row['satuan'])
                    data += '<tr>';
                    data += '<td>'+(parseInt(i)+parseInt(1))+'</td>';
                    data += '<td>';
                    data += '<select class="form-price price-unit" id="dimensi'+row['id']+'" name="price_units"">';
                    data += '</select>';
                    data += '</td>';
                    data += '<td style="text-align:right;"><input type="text" class="form-price" value="'+currency(row["kode_item"]).format().replace("$", "")+'" id="'+4008+row["id"]+'" oninput="currency_price_dimensi('+row['id']+','+4008+', this.value)" style="text-align:right;"></td>';
                    data += '<td style="text-align:right;"><input type="text" class="form-price" value="'+currency(row["name"]).format().replace("$", "")+'" id="'+4009+row["id"]+'" oninput="currency_price_dimensi('+row['id']+','+4009+', this.value)" style="text-align:right;"></td>';
                    data += '<td style="text-align:right;"><input type="text" class="form-price" value="'+currency(row["jumlah"]).format().replace("$", "")+'" id="'+4010+row["id"]+'" oninput="currency_price_dimensi('+row['id']+','+4010+', this.value)" style="text-align:right;"></td>';
                    data += '<td style="text-align:right;"><input type="text" class="form-price" value="'+currency(row["jumlah_terima"]).format().replace("$", "")+'" id="'+4011+row["id"]+'" oninput="currency_price_dimensi('+row['id']+','+4011+', this.value)" style="text-align:right;"></td>';
                    data += '<td style="text-align:right;"><input type="text" class="form-price" value="'+currency(row["potongan"]).format().replace("$", "")+'" id="'+4011+row["id"]+'" oninput="currency_price_dimensi('+row['id']+','+4011+', this.value)" style="text-align:right;"></td>';
                    data += '<td style="text-align:right;"><input type="text" class="form-price" value="'+currency(row["harga"]).format().replace("$", "")+'" id="'+4011+row["id"]+'" oninput="currency_price_dimensi('+row['id']+','+4011+', this.value)" style="text-align:right;"></td>';
                    data += '<td style="text-align:right;"><input type="text" class="form-price" value="'+currency(row["total"]).format().replace("$", "")+'" id="'+4011+row["id"]+'" oninput="currency_price_dimensi('+row['id']+','+4011+', this.value)" style="text-align:right;"></td>';
                    data += '<td style="width:10px;">';
                    data += '<div class="btn-group" ">';
                    data += '<a href="#" id="btn-save-dimensi'+row['id']+'" class="btn btn-sm btn-primary" onclick="save_purchase_item('+row['id']+')"><i class="fa fa-save"></i></button>';
                    data += '<a href="#" id="btn-delete-satuan'+row['id']+'" class="btn btn-sm btn-danger" onclick="delete_purchase_item('+row['id']+')"><i class="fa fa-trash"></i></button>';
                    data += '</div>';
                    data += '</td>';
                    data += '</tr>';
                });
                $("#tbl-dimensi_harga").html(data);
            },
        });
    }

    function save_purchase_item(a){
        var satuan = $("#unit"+a).val();
        var berat = $("#"+4008+a).val();
        var panjang = $("#"+4009+a).val();
        var lebar = $("#"+4010+a).val();
        var tinggi = $("#"+4011+a).val();
    
        $("#btn-save-dimensi"+a).html('..');

            $.ajax({
            type: "POST",
            url: base_url("json/update-unit-price/"),
            data: { 
                id: a,
                satuan: satuan, 
                berat: berat, 
                panjang: panjang, 
                lebar: lebar, 
                tinggi: tinggi, 
                type: 'dimensi'
            },
            success: function (response) {
            $("#btn-save-dimensi"+a).html('<i class="fa fa-save"></i>');
             get_purchase_item('<?php echo $id; ?>')
            },
        });
    }
    function delete_purchase_item(a){
        if(confirm('Hapus data?')){
            $.ajax({
                type: "POST",
                url: base_url("json/delete-purchase_item"),
                data: {id: a },
                success: function (response) {
                get_purchase_item('<?php echo $id; ?>');
                console.log(response)
                },
            });
        }
    }
</script>