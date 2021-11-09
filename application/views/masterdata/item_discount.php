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
    <tbody id="tbl-dimensi_harga"></tbody>
</table>
</div>
<a href="#" id="btn-add_satuan_dimensi" class="btn btn-sm btn-primary" onclick="add_satuan_dimensi('<?php echo $id; ?>')"><i class="fa fa-plus"></i> Tambah Potongan</a>
<a href="#" id="btn-refresh_dimensi" class="btn btn-sm btn-success" onclick="get_price_dimensi('<?php echo $id; ?>')"><i class="fa fa-refresh"></i> Refresh Tabel</a>

<script>
    function add_satuan_dimensi(a){
        $("#btn-add_satuan_dimensi").html('Menyiapkan data ..');
        $.ajax({
            type: "POST",    
            data: { item_id: a },
            url: base_url("json/add-unit-price"),
            success: function (result) {
                get_price_dimensi(a)
                $("#btn-add_satuan_dimensi").html('Tambah satuan');
            },
        });
    }
    function get_price_dimensi(a){
        $.ajax({
            type: "POST",    
            data: { item_id: a },
            url: base_url("json/get-unit-price"),
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
                    data += '<td style="text-align:right;"><input type="text" class="form-price" value="'+currency(row["berat"]).format().replace("$", "")+'" id="'+4008+row["id"]+'" oninput="currency_price_dimensi('+row['id']+','+4008+', this.value)" style="text-align:right;"></td>';
                    data += '<td style="text-align:right;"><input type="text" class="form-price" value="'+currency(row["panjang"]).format().replace("$", "")+'" id="'+4009+row["id"]+'" oninput="currency_price_dimensi('+row['id']+','+4009+', this.value)" style="text-align:right;"></td>';
                    data += '<td style="text-align:right;"><input type="text" class="form-price" value="'+currency(row["lebar"]).format().replace("$", "")+'" id="'+4010+row["id"]+'" oninput="currency_price_dimensi('+row['id']+','+4010+', this.value)" style="text-align:right;"></td>';
                    data += '<td style="text-align:right;"><input type="text" class="form-price" value="'+currency(row["tinggi"]).format().replace("$", "")+'" id="'+4011+row["id"]+'" oninput="currency_price_dimensi('+row['id']+','+4011+', this.value)" style="text-align:right;"></td>';
                    data += '</tr>';
                });
                $("#tbl-dimensi_harga").html(data);
            },
        });
    }

    function save_dimensi_price(a){
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
                console.log(berat)
            $("#btn-save-dimensi"+a).html('<i class="fa fa-save"></i>');
             get_price_dimensi('<?php echo $id; ?>')
            },
        });
    }
    function delete_dimensi_price(a){
        if(confirm('Hapus data?')){
            $.ajax({
                type: "POST",
                url: base_url("json/delete-unit-price"),
                data: {id: a },
                success: function (response) {
                get_price_dimensi('<?php echo $id; ?>')
                },
            });
        }
    }
</script>