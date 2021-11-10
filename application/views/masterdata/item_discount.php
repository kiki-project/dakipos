<div style="overflow:auto;white-space: nowrap;">
<table class="table table-bordered table-stripped">
    <thead>
        <tr>
            <th style="width:20px;">No</th>
            <th style="width:150px;">Kode Group</th>
            <th>Potongan 1 (%)</th>
            <th>Potongan 2 (%)</th>
            <th>Potongan 3 (%)</th>
            <th>Potongan 4 (%)</th>
        </tr>
    </thead>
    <tbody id="tbl-discount_harga"></tbody>
</table>
</div>
<a href="#" id="btn-add_satuan_discount" class="btn btn-sm btn-primary" onclick="add_satuan_discount('<?php echo $id; ?>')"><i class="fa fa-plus"></i> Tambah Potongan</a>
<a href="#" id="btn-refresh_discount" class="btn btn-sm btn-success" onclick="get_price_discount('<?php echo $id; ?>')"><i class="fa fa-refresh"></i> Refresh Tabel</a>

<script>
    function add_satuan_discount(a){
        $("#btn-add_satuan_discount").html('Menyiapkan data ..');
        $.ajax({
            type: "POST",    
            data: { item_id: a },
            url: base_url("json/add-item-discount"),
            success: function (result) {
                get_price_discount(a)
                $("#btn-add_satuan_discount").html('Tambah satuan');
            },
        });
    }
    function get_price_discount(a){
        $.ajax({
            type: "POST",    
            data: { item_id: a },
            url: base_url("json/get-item-discount"),
            success: function (response) {            
                result = JSON.parse(response);
                var data = "";
                $.each(result, function (i, row) {
                    get_units_select_price_type('discount'+row['id'], row['satuan'])
                    data += '<tr>';
                    data += '<td>'+(parseInt(i)+parseInt(1))+'</td>';
                    data += '<td>';
                    data += '<select class="form-price price-unit" id="group'+row['id']+'" name="kode_group"">';
                    data += '</select>';
                    data += '</td>';
                    data += '<td style="text-align:right;"><input type="text" class="form-price" value="'+currency(row["potongan"]).format().replace("$", "")+'" id="'+4008+row["id"]+'" oninput="currency_price_discount('+row['id']+','+4008+', this.value)" style="text-align:right;"></td>';
                    data += '<td style="text-align:right;"><input type="text" class="form-price" value="'+currency(row["potongan2"]).format().replace("$", "")+'" id="'+4009+row["id"]+'" oninput="currency_price_discount('+row['id']+','+4009+', this.value)" style="text-align:right;"></td>';
                    data += '<td style="text-align:right;"><input type="text" class="form-price" value="'+currency(row["potongan3"]).format().replace("$", "")+'" id="'+4010+row["id"]+'" oninput="currency_price_discount('+row['id']+','+4010+', this.value)" style="text-align:right;"></td>';
                    data += '<td style="text-align:right;"><input type="text" class="form-price" value="'+currency(row["potongan4"]).format().replace("$", "")+'" id="'+4011+row["id"]+'" oninput="currency_price_discount('+row['id']+','+4011+', this.value)" style="text-align:right;"></td>';
                    data += '<td>';
                    data += '<div class="btn-group">';
                    data += '<a href="#" id="btn-save-discount'+row['id']+'" class="btn btn-sm btn-primary" onclick="save_discount_price('+row['id']+')"><i class="fa fa-save"></i></button>';
                    data += '<a href="#" id="btn-delete-discount'+row['id']+'" class="btn btn-sm btn-danger" onclick="delete_discount_price('+row['id']+')"><i class="fa fa-trash"></i></button>';
                    data += '</div>';
                    data += '</td>';
                    data += '</tr>';
                });
                $("#tbl-discount_harga").html(data);
            },
        });
    }

    function save_discount_price(a){
        var satuan = $("#group"+a).val();
        var potongan = $("#"+4008+a).val();
        var potongan2 = $("#"+4009+a).val();
        var potongan3 = $("#"+4010+a).val();
        var potongan4 = $("#"+4011+a).val();
    
        $("#btn-save-discount"+a).html('..');

            $.ajax({
            type: "POST",
            url: base_url("json/update-item-discount/"),
            data: { 
                id: a,
                satuan: satuan, 
                potongan: potongan, 
                potongan2: potongan2, 
                potongan3: potongan3, 
                potongan4: potongan4, 
                type: 'discount'
            },
            success: function (response) {
                console.log(potongan)
            $("#btn-save-discount"+a).html('<i class="fa fa-save"></i>');
             get_price_discount('<?php echo $id; ?>')
            },
        });
    }
    function delete_discount_price(a){
        if(confirm('Hapus data?')){
            $.ajax({
                type: "POST",
                url: base_url("json/delete-item-discount"),
                data: {id: a },
                success: function (response) {
                get_price_discount('<?php echo $id; ?>')
                },
            });
        }
    }
</script>