<div style="overflow:auto;white-space: nowrap;height:350px;border:1px solid #ccc;">
<table class="table table-bordered table-stripped">
    <thead>
        <tr>
            <th style="width:20px;">No</th>
            <th style="width:150px;">Kode</th>
            <th>Nama</th>
            <th>Satuan</th>
            <th>Jumlah</th>
            <th>jml Terima</th>
            <th>Harga</th>
            <th>Pot(%)</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody id="tbl-purchase_item"></tbody>
</table>
</div>
<a href="#" id="btn-add_item" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-items" onclick="get_item_list_radio(10, '')" ><i class="fa fa-plus"></i> Tambah item</a>
<a href="#" id="btn-refresh_purchase_item" class="btn btn-sm btn-success" onclick="get_purchase_item('<?php echo $id; ?>')"><i class="fa fa-refresh"></i> Refresh Tabel</a>

<script>
    
    function get_purchase_item(a){
        var type = 'order';
        $.ajax({
            type: "POST",    
            data: { id: a, type: type },
            url: base_url("json/get-purchase_item"),
            success: function (response) {            
                result = JSON.parse(response);
                var data = "";
                var total_harga = 0;
                var qty = 0;
                $.each(result, function (i, row) {
                    get_units_prchase_item('satuan_purchase_item'+row['id'], row['satuan'], row['item_id'])
                    data += '<tr>';
                    data += '<td>'+(parseInt(i)+parseInt(1))+'</td>';
                    data += '<td>'+row['kode_item']+'</td>';
                    data += '<td>'+row['name']+'</td>';
                    data += '<td>';
                    data += '<select class="form-price price-unit" id="satuan_purchase_item'+row['id']+'" name="satuan" onchange="set_price_unit_purchase('+row['id']+',this.value,'+type+')">';
                    data += '</select>';
                    data += '</td>';
                    data += '<td style="text-align:right;"><input type="text" class="form-price" value="'+currency(row["jumlah"]).format().replace("$", "")+'" id="'+5001+row["id"]+'" oninput="hitung_currency_purchase_item('+row['id']+','+5001+', this.value)" style="text-align:right;"></td>';
                    data += '<td style="text-align:right;"><input type="text" readonly="true" class="form-price" value="'+currency(row["jumlah_terima"]).format().replace("$", "")+'" id="'+5002+row["id"]+'" oninput="currency_purchase_item('+row['id']+','+5002+', this.value)" style="text-align:right;"></td>';
                    data += '<td style="text-align:right;"><input type="text" class="form-price" value="'+currency(row["harga"]).format().replace("$", "")+'" id="'+5003+row["id"]+'" oninput="hitung_currency_purchase_item('+row['id']+','+5003+', this.value)" style="text-align:right;"></td>';
                    data += '<td style="text-align:right;"><input type="text" class="form-price" value="'+currency(row["potongan"]).format().replace("$", "")+'" id="'+5004+row["id"]+'" oninput="hitung_currency_purchase_item('+row['id']+','+5004+', this.value)" style="text-align:right;"></td>';
                    data += '<td style="text-align:right;"><input type="text" readonly="true" class="form-price" value="'+currency(row["total"]).format().replace("$", "")+'" id="'+5005+row["id"]+'" oninput="currency_purchase_item('+row['id']+','+5005+', this.value)" style="text-align:right;"></td>';
                    data += '<td style="width:10px;">';
                    data += '<div class="btn-group" ">';
                    data += '<a href="#" id="btn-save-purchase_item'+row['id']+'" class="btn btn-sm btn-primary" onclick="save_purchase_item('+row['id']+')"><i class="fa fa-save"></i></button>';
                    data += '<a href="#" id="btn-delete-satuan'+row['id']+'" class="btn btn-sm btn-danger" onclick="delete_purchase_item('+row['id']+')"><i class="fa fa-trash"></i></button>';
                    data += '</div>';
                    data += '</td>';
                    data += '</tr>';
                    total_harga += parseInt(row["total"]);
                    qty += parseInt(row["jumlah"]);
                });
                
                hitung_currency('harga', currency(total_harga).format().replace("$", ""));
                hitung_currency('sub_total_item', currency(qty).format().replace("$", ""));
                $("#tbl-purchase_item").html(data);
            },
        });
    }

    function save_purchase_item(a){
        var satuan = $("#satuan_purchase_item"+a).val();
        var jumlah = $("#"+5001+a).val();
        var jumlah_terima = $("#"+5002+a).val();
        var harga = $("#"+5003+a).val();
        var potongan = $("#"+5004+a).val();
        var total = $("#"+5005+a).val();
    
        $("#btn-save-purchase_item"+a).html('..');

            $.ajax({
            type: "POST",
            url: base_url("json/update-purchase_item/"),
            data: { 
                id: a,
                satuan: satuan, 
                jumlah: jumlah, 
                harga: harga, 
                jumlah_terima: jumlah_terima, 
                potongan: potongan, 
                total: total, 
            },
            success: function (response) {
            $("#btn-save-purchase_item"+a).html('<i class="fa fa-save"></i>');
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
                },
            });
        }
    }
</script>