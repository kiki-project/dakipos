function base_url(a) {
  return $("#base_url").val() + a;
}
function cek_user(a) {
  $.ajax({
    type: "POST",
    url: base_url("json/cek-username"),
    data: { user_name: a },
    success: function (response) {
      data = JSON.parse(response);
      if (data == 1) {
        var err = "Username sudah digunakan";
      } else {
        var letters = /^[A-Za-z0-9]+$/;
        if (a.match(letters)) {
          var err = "";
        } else {
          var err = "Username tidak sesuai";
        }
      }
      $("#err_user").html(err);
    },
  });
}
function cek_user_repas(a) {
  var pass = document.getElementById("us-password").value;
  if (a == pass) {
    var err = "";
  } else {
    var err = "Password tidak sesuai";
  }
  $("#err_user_repass").html(err);
}
function add_user() {
  $("#us-title-form").html("Tambah data");
  $("#us-btn-submit").val("Simpan");

  $("#us-id").val("");
  $("#us-role_id").val("");
  $("#us-name").val("");
  $("#us-user_name").val("");
  $("#us-password").val("");
  $("#us-re_password").val("");
  $("#us-report_to").val("");

  $("#us-role_id").attr("required", "true");
  $("#us-name").attr("required", "true");
  $("#us-user_name").attr("required", "true");
  $("#us-password").attr("required", "true");
  $("#us-re_password").attr("required", "true");

  $("#us-frm-role_id").css("display", "block");
  $("#us-frm-name").css("display", "block");
  $("#us-frm-user_name").css("display", "block");
  $("#us-frm-password").css("display", "block");
  $("#us-frm-re_password").css("display", "block");
  $("#us-frm-report_to").css("display", "block");

  $("#err_user").html("");
  $("#err_user_repass").html("");
}
function edit_user(a) {
  $("#us-title-form").html("Edit data");
  $("#us-btn-submit").val("Update");
  $.ajax({
    type: "POST",
    url: base_url("json/get-user"),
    data: { id: a },
    success: function (response) {
      data = JSON.parse(response);
      $("#us-id").val(data["id"]);
      $("#us-role_id").val(data["role_id"]);
      $("#us-name").val(data["name"]);
      $("#us-user_name").val(data["user_name"]);
      $("#us-report_to").val(data["report_to"]);

      $("#us-frm-role_id").css("display", "block");
      $("#us-frm-name").css("display", "block");
      $("#us-frm-user_name").css("display", "block");
      $("#us-frm-password").css("display", "none");
      $("#us-frm-re_password").css("display", "none");
      $("#us-frm-report_to").css("display", "block");

      $("#us-password").removeAttr("required");
      $("#us-re_password").removeAttr("required");

      $("#err_user").html("");
      $("#err_user_repass").html("");
    },
  });
}

function reset_password(a) {
  $("#us-title-form").html("Reset Password");
  $("#us-btn-submit").val("Reset Password");
  $.ajax({
    type: "POST",
    url: base_url("json/get-user"),
    data: { id: a },
    success: function (response) {
      data = JSON.parse(response);
      $("#us-id").val(data["id"]);
      $("#us-role_id").val("");
      $("#us-name").val("");
      $("#us-user_name").val("");
      $("#us-password").val("");
      $("#us-re_password").val("");
      $("#us-report_to").val("");

      $("#us-frm-role_id").css("display", "none");
      $("#us-frm-name").css("display", "none");
      $("#us-frm-user_name").css("display", "none");
      $("#us-frm-password").css("display", "block");
      $("#us-frm-re_password").css("display", "block");
      $("#us-frm-report_to").css("display", "none");

      $("#us-role_id").removeAttr("required");
      $("#us-name").removeAttr("required");
      $("#us-user_name").removeAttr("required");
      $("#us-password").attr("required", "true");
      $("#us-re_password").attr("required", "true");
      $("#us-report_to").removeAttr("required");

      $("#err_user").html("");
      $("#err_user_repass").html("");
    },
  });
}

function add_role() {
  $("#role-title-form").html("Tambah data");
  $("#role-btn-submit").val("Simpan");
}
function edit_role(role_id) {
  $.ajax({
    type: "POST",
    url: base_url("json/get-role"),
    data: { role_id: role_id },
    success: function (response) {
      data = JSON.parse(response);
      if (data) {
        $("#role-id").val(role_id);
        $("#role-name").val(data["name"]);
        $("#role-desc").val(data["description"]);
        $("#role-title-form").html("Update data");
        $("#role-btn-submit").val("Update");
      } else {
        $("#role-name").val("");
        $("#role-desc").val("");
        $("#role-title-form").html("Tambah data");
        $("#role-btn-submit").val("Simpan");
      }
    },
  });
}
function edit_role_module(module_id, role_id) {
  $("#rm-title-form").html("Edit data");
  $("#rm-module_id").val(module_id);
  $("#rm-role_id").val(role_id);
  $("#rm-btn-submit").val("Simpan");

  $.ajax({
    type: "POST",
    url: base_url("json/get-role_module"),
    data: { role_id: role_id, module_id: module_id },
    success: function (response) {
      data = JSON.parse(response);
      if (data) {
        $("#rm-access").val(data["access"]);
        $("#rm-list").val(data["list"]);
        $("#rm-edit").val(data["edit"]);
        $("#rm-delete").val(data["delete"]);
      } else {
        $("#rm-access").val("None");
        $("#rm-list").val("None");
        $("#rm-edit").val("None");
        $("#rm-delete").val("None");
      }
    },
  });
}
function add_item() {
  $("#item-title-form").html("Tambah data (Data Umum)");
  get_types_select();
  get_brands_select();
  get_units_select();
}
function get_types_select() {
  $.ajax({
    type: "GET",
    url: base_url("json/get-item_types"),
    success: function (response) {
      result = JSON.parse(response);
      var data = "";
      data += '<option value=""></option>';
      $.each(result, function (i, row) {
        data +=
          '<option value="' + row["kode"] + '">' + row["kode"] + "</option>";
      });
      $("#item-jenis").html(data);
    },
  });
}
function frm_jenis_item() {
  $.ajax({
    type: "GET",
    url: base_url("json/get-item_types"),
    success: function (response) {
      result = JSON.parse(response);
      var data = "";
      $.each(result, function (i, row) {
        data += "<tr>";
        data +=
          '<td><input type="checkbox" id="cb_item_types" name="cb_item_types[]" value="' +
          row["id"] +
          '"></td>';
        data += "<td>" + row["kode"] + "</td>";
        data += "<td>" + row["description"] + "</td>";
        data += "</tr>";
      });
      $("#item-tbl-jenis").html(data);
    },
  });
}

function get_brands_select() {
  $.ajax({
    type: "GET",
    url: base_url("json/get-item_brands"),
    success: function (response) {
      result = JSON.parse(response);
      var data = "";
      data += '<option value=""></option>';
      $.each(result, function (i, row) {
        data +=
          '<option value="' + row["kode"] + '">' + row["kode"] + "</option>";
      });
      $("#item-brand").html(data);
    },
  });
}
function get_units_select(a) {
  $.ajax({
    type: "GET",
    url: base_url("json/get-item_units"),
    success: function (response) {
      result = JSON.parse(response);
      var data = "";
      data += '<option value=""></option>';
      $.each(result, function (i, row) {
        
        if(a == row['kode']){ 
           select = 'selected="true"';
         }else{
           select = '';
         }
        data +=
          '<option value="' + row["kode"] + '" '+select+'>' + row["kode"] + "</option>";
      });
      $("#item-unit").html(data);
    },
  });
}
function get_units_select_price_type(a,b) {
  $.ajax({
    type: "GET",
    url: base_url("json/get-item_units"),
    success: function (response) {
      result = JSON.parse(response);
      var data = "";
      data += '<option value=""></option>';
      $.each(result, function (i, row) {
        if(b == row['kode']){ 
           select = 'selected="true"';
         }else{
           select = '';
         }
        data +='<option value="'+row["kode"] + '" '+select+'>'+row["kode"] + "</option>";
      });
      $("#"+a).html(data);
    },
  });
}
function get_units_prchase_item(a,b,c) {
  $.ajax({
    type: "POST",    
    data: { item_id: c },
    url: base_url("json/get-unit-price"),
    success: function (response) {
      result = JSON.parse(response);
      var data = "";
      data += '<option value=""></option>';
      $.each(result, function (i, row) {
        if(b == row['satuan']){ 
           select = 'selected="true"';
         }else{
           select = '';
         }
        data +='<option value="'+row["satuan"] + '" '+select+'>'+row["satuan"] + "</option>";
      });
      $("#"+a).html(data);
    },
  });
}

function get_item_group_select(a,b) {
  $.ajax({
    type: "GET",
    url: base_url("json/get-item_groups"),
    success: function (response) {
      result = JSON.parse(response);
      var data = "";
      data += '<option value=""></option>';
      $.each(result, function (i, row) {
        if(b == row['kode']){ 
           select = 'selected="true"';
         }else{
           select = '';
         }
        data +='<option value="'+row["kode"] + '" '+select+'>'+row["kode"] + "</option>";
      });
      $("#"+a).html(data);
    },
  });
}

function frm_brands_item() {
  $.ajax({
    type: "GET",
    url: base_url("json/get-item_brands"),
    success: function (response) {
      result = JSON.parse(response);
      var data = "";
      $.each(result, function (i, row) {
        data += "<tr>";
        data +=
          '<td><input type="checkbox" id="cb_item_brands" name="cb_item_brands[]" value="' +
          row["id"] +
          '"></td>';
        data += "<td>" + row["kode"] + "</td>";
        data += "<td>" + row["description"] + "</td>";
        data += "</tr>";
      });
      $("#item-tbl-brands").html(data);
    },
  });
}

function frm_units_item() {
  $.ajax({
    type: "GET",
    url: base_url("json/get-item_units"),
    success: function (response) {
      result = JSON.parse(response);
      var data = "";
      $.each(result, function (i, row) {
        data += "<tr>";
        data +=
          '<td><input type="checkbox" id="cb_item_units" name="cb_item_units[]" value="' +
          row["id"] +
          '"></td>';
        data += "<td>" + row["kode"] + "</td>";
        data += "<td>" + row["description"] + "</td>";
        data += "</tr>";
      });
      $("#item-tbl-units").html(data);
    },
  });
}
function frm_groups_item() {
  $.ajax({
    type: "GET",
    url: base_url("json/get-item_groups"),
    success: function (response) {
      result = JSON.parse(response);
      var data = "";
      $.each(result, function (i, row) {
        data += "<tr>";
        data +=
          '<td><input type="checkbox" id="cb_item_groups" name="cb_item_groups[]" value="' +
          row["id"] +
          '"></td>';
        data += "<td>" + row["kode"] + "</td>";
        data += "<td>" + row["description"] + "</td>";
        data += "</tr>";
      });
      $("#item-tbl-groups").html(data);
    },
  });
}

function set_price_unit_purchase(id,satuan,rel_id){

  $.ajax({
    type: "POST",
    url: base_url("json/update-satuan-purchase_item"),
    data: { id: id, satuan: satuan },
    success: function (response) {
      data = JSON.parse(response);
        get_purchase_item(rel_id)
    },
  });
}

function toggle_item_types(source) {
  var checkboxes = document.querySelectorAll("#cb_item_types");
  for (var i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i] != source) checkboxes[i].checked = source.checked;
  }
}
function toggle_item_brands(source) {
  var checkboxes = document.querySelectorAll("#cb_item_brands");
  for (var i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i] != source) checkboxes[i].checked = source.checked;
  }
}
function set_currency_value(id, num) {

  var num = num
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(".00", "");
  var num = currency(num)
    .format()
    .replace("$", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "");

  if (id == "item-persentase") {
    var hrg_pok = $("#item-harga-pokok").val().replace(",", "");
    var percent = num;
    laba = (percent * hrg_pok) / 100;

    hrg_jual = parseInt(hrg_pok) + parseInt(laba);
    $("#item-harga-jual").val(currency(hrg_jual).format().replace("$", ""));
    console.log(hrg_jual);
  } else if (id == "item-harga-pokok") {
    var percent = $("#item-persentase").val().replace(",", "");
    var hrg_pok = num;
    laba = (percent * hrg_pok) / 100;

    hrg_jual = parseInt(hrg_pok) + parseInt(laba);
    $("#item-harga-jual").val(currency(hrg_jual).format().replace("$", ""));
  } else if (id == "item-harga-jual") {
    var hrg_pok = $("#item-harga-pokok").val().replace(",", "");
    var hrg_jual = num;
    var laba = hrg_jual - hrg_pok;
    percent = (laba * 100) / hrg_pok;

    $("#item-persentase").val(currency(percent).format().replace("$", ""));
  }

  $("#" + id).val(currency(num).format().replace("$", ""));
}
function input_clear_currency(id) {
  if (id == "item-persentase") {
    var hrg_pok = $("#item-harga-pokok")
      .val()
      .replace(".00", "")
      .replace(",", "");
    percent = (0 * hrg_pok) / 100;
    hrg_jual = parseInt(hrg_pok) + parseInt(percent);
    $("#item-harga-jual").val(currency(hrg_jual).format().replace("$", ""));
  } else if (id == "item-harga-pokok") {
    $("#item-harga-jual").val(currency(0).format().replace("$", ""));
  }
  $("#" + id).val(currency(0).format().replace("$", ""));
  hitung_orders(id);
}
function input_clear_currency_purchases(id) {
  if (id == "item-persentase") {
    var hrg_pok = $("#item-harga-pokok")
      .val()
      .replace(".00", "")
      .replace(",", "");
    percent = (0 * hrg_pok) / 100;
    hrg_jual = parseInt(hrg_pok) + parseInt(percent);
    $("#item-harga-jual").val(currency(hrg_jual).format().replace("$", ""));
  } else if (id == "item-harga-pokok") {
    $("#item-harga-jual").val(currency(0).format().replace("$", ""));
  }
  $("#" + id).val(currency(0).format().replace("$", ""));
  hitung_purchases(id);
}

function add_cust() {
  $("#cust-title-form").html("Tambah data");
}
function get_item_list_radio(a, b) {
  $.ajax({
    type: "POST",
    url: base_url("json/get-item-list/"),
    data: { limit: a, src: b },

    success: function (response) {
      result = JSON.parse(response);
      var data = "";
      $.each(result, function (i, row) {
        data += "<tr>";
        data +=
          '<td><input type="radio" id="rd_kode" name="kode" value="' +
          row["kode"] +
          '"></td>';
        data += "<td>" + row["kode"] + "</td>";
        data += "<td>" + row["name"] + "</td>";
        data += "<td>" + row["jenis"] + "</td>";
        data += "<td></td>";
        data += "<td>" + row["stok_minimum"] + "</td>";
        data += "<td>" + row["satuan_dasar"] + "</td>";
        data += "<td>" + row["supplier"] + "</td>";
        data += "</tr>";
      });
      $("#items-list-json").html(data);
    },
  });
}

function replace_satu_harga(data){
  if(data != 'none'){

    $("#item-unit").val(data['satuan_dasar']);
    $("#item-poin-dasar").val(currency(data["poin_dasar"]).format().replace("$", ""));
    $("#item-barcode").val(data['barcode']);
    $("#item-komisi-sales").val(currency(data["komisi_sales"]).format().replace("$", ""));
    $("#item-harga-pokok").val(currency(data["harga_pokok"]).format().replace("$", ""));
    $("#item-persentase").val(currency(data["persentase"]).format().replace("$", ""));
    $("#item-harga-jual").val(currency(data["harga_jual"]).format().replace("$", ""));
  }

}
function toggle_items_list(source) {
  var checkboxes = document.querySelectorAll("#cb_items");
  for (var i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i] != source) checkboxes[i].checked = source.checked;
  }
}
function hitung_currency(id, val) {
  set_currency_value(id, val);
  hitung_orders(id);
}
function hitung_orders(id) {
  var hrg = $("#harga")
    .val()
    .replace(".00", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "");
  var qty = $("#sub_total_item")
    .val()
    .replace(".00", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "");
  var pot = $("#potongan")
    .val()
    .replace(".00", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "");
  var pot_n = (pot * (hrg * qty)) / 100;
  var ipot_nota_p = $("#pot_nota_percent")
    .val()
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "");
  var ipot_nota_n = $("#pot_nota_nilai")
    .val()
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "");
  var ipajak_p = $("#pajak_percent")
    .val()
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "");
  var ipajak_n = $("#pajak_nilai")
    .val()
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "");
  var dp = $("#dp")
    .val()
    .replace(".00", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "");

  var val_sub_total = parseInt(hrg) - parseInt(pot_n);

  if (id == "pot_nota_percent") {
    var pot_nota_n = (ipot_nota_p * val_sub_total) / 100;
    $("#pot_nota_nilai").val(currency(pot_nota_n).format().replace("$", ""));
    var pot_nota_p = ipot_nota_p;
  } else {
    var pot_nota_n = ipot_nota_n;
  }

  if (id == "pot_nota_nilai") {
    var pot_nota_p = (ipot_nota_n * 100) / val_sub_total;
    $("#pot_nota_percent").val(currency(pot_nota_p).format().replace("$", ""));
    var pot_nota_n = ipot_nota_n;
  } else {
    var pot_nota_p = ipot_nota_p;
  }

  var val_hrg_akhir = parseInt(val_sub_total) - parseInt(pot_nota_n);

  var val_kurang = parseInt(val_hrg_akhir) - parseInt(dp);
  if (val_kurang < 0 || dp >= val_hrg_akhir) {
    var kurang = 0;
  } else {
    var kurang = val_kurang;
  }

  $("#sub_total_harga").val(currency(val_sub_total).format().replace("$", ""));
  $("#total_akhir_harga").val(
    currency(val_hrg_akhir).format().replace("$", "")
  );
  $("#kekurangan").val(currency(kurang).format().replace("$", ""));
}
function hitung_currency_purchases(id, val) {
  set_currency_value(id, val);
  hitung_purchases(id);
}
function hitung_purchases(id) {
  var hrg = $("#harga")
    .val()
    .replace(".00", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "");
  var qty = $("#sub_total_item")
    .val()
    .replace(".00", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "");
  var pot = $("#potongan")
    .val()
    .replace(".00", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "");
  var pot_n = (pot * (hrg * qty)) / 100;
  var ipot_nota_p = $("#pot_nota_percent")
    .val()
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "");
  var ipot_nota_n = $("#pot_nota_nilai")
    .val()
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "");
  var ipajak_p = $("#pajak_percent")
    .val()
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "");
  var ipajak_n = $("#pajak_nilai")
    .val()
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "");
  var dp = $("#dp")
    .val()
    .replace(".00", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "");
  var biaya_lain = $("#biaya_lain")
    .val()
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "")
    .replace(",", "");

  var sub_total = 1 * parseInt(hrg) - parseInt(pot_n);

  if ($("#tambah_total").is(":checked")) {
    var val_sub_total = parseInt(sub_total) + parseInt(biaya_lain);
  } else {
    var val_sub_total = sub_total;
  }

  if (id == "pot_nota_percent") {
    var pot_nota_n = (ipot_nota_p * val_sub_total) / 100;
    $("#pot_nota_nilai").val(currency(pot_nota_n).format().replace("$", ""));
    var pot_nota_p = ipot_nota_p;
  } else {
    var pot_nota_n = ipot_nota_n;
  }

  if (id == "pot_nota_nilai") {
    var pot_nota_p = (ipot_nota_n * 100) / val_sub_total;
    $("#pot_nota_percent").val(currency(pot_nota_p).format().replace("$", ""));
    var pot_nota_n = ipot_nota_n;
  } else {
    var pot_nota_p = ipot_nota_p;
  }

  var val_hrg_akhir = parseInt(val_sub_total) - parseInt(pot_nota_n);

  var val_kurang = parseInt(val_hrg_akhir) - parseInt(dp);
  if (val_kurang < 0 || dp >= val_hrg_akhir) {
    var kurang = 0;
  } else {
    var kurang = val_kurang;
  }

  $("#sub_total_harga").val(currency(val_sub_total).format().replace("$", ""));
  $("#total_akhir_harga").val(
    currency(val_hrg_akhir).format().replace("$", "")
  );
  $("#kredit").val(currency(kurang).format().replace("$", ""));
}

function currency_price_units(id,code, val) {
  id_code = code+''+id;
  set_currency_value(id_code, val);
}

function currency_price_discount(id,code, val) {
  id_code = code+''+id;
  set_currency_value(id_code, val);
}

function hitung_currency_price_units(id,code, val) {
  id_code = code+''+id;
  set_currency_value(id_code, val);
  hitung_price_units(id,code);
}
function hitung_price_units(id, code){

  	var id_hp = 1004;
  	var id_proc = 1005;
  	var id_hj = 1006;

  var harga_pokok = $("#"+id_hp+id)
      .val()
      .replace(".00", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "");
      
  var proc = $("#"+id_proc+id)
      .val()
      .replace(".00", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "");
      
  var harga_jual = $("#"+id_hj+id)
      .val()
      .replace(".00", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "");
  if(code == id_hj){
  var laba = parseInt(harga_jual) - parseInt(harga_pokok);
  var n_proc = (laba / parseInt(harga_pokok)) * 100;
  var n_jual = harga_jual;
  }else if(code == id_proc || code == id_hp){
  var n_proc = proc;
    
    if(harga_jual != 0 && proc != 0){
    var laba = (parseInt(proc) * parseInt(harga_pokok)) / 100;
    var n_jual = (parseInt(harga_pokok) + parseInt(laba))
    }else{
    var n_jual = parseInt(harga_pokok);
    }
  }
  
  $("#"+id_proc+''+id).val(currency(parseInt(n_proc)).format().replace("$", ""));
  $("#"+id_hj+''+id).val(currency(parseInt(n_jual)).format().replace("$", ""));
  
}


function currency_price_dimensi(id,code, val) {
  id_code = code+''+id;
  set_currency_value(id_code, val);
}

function currency_price_level(id,code, val) {
  id_code = code+''+id;
  set_currency_value(id_code, val);
}
function hitung_currency_price_level(id,code, val) {
  id_code = code+''+id;
  set_currency_value(id_code, val);
  hitung_price_level(id,code);
}
function hitung_price_level(id, code){

  var cd = code.toString();
  var part = cd.substring( 0,1 );

  if(part == 3){
    
  	var id_hp = 3004;
  	var id_proc = 3005;
  	var id_proc2 = 30052;
  	var id_proc3 = 30053;
  	var id_hj = 3006;
  	var id_hj2 = 30062;
  	var id_hj3 = 30063;
  }else{
    
  	var id_hp = 2004;
  	var id_proc = 2005;
  	var id_proc2 = 20052;
  	var id_proc3 = 20053;
  	var id_hj = 2006;
  	var id_hj2 = 20062;
  	var id_hj3 = 20063;
  }


  var harga_pokok = $("#"+id_hp+id)
      .val()
      .replace(".00", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "");
      
  var proc = $("#"+id_proc+id)
      .val()
      .replace(".00", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "");
      
  var proc2 = $("#"+id_proc2+id)
      .val()
      .replace(".00", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "");
      
  var proc3 = $("#"+id_proc3+id)
      .val()
      .replace(".00", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "");
      
  var harga_jual = $("#"+id_hj+id)
      .val()
      .replace(".00", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "");
      
  var harga_jual2 = $("#"+id_hj2+id)
      .val()
      .replace(".00", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "");
      
  var harga_jual3 = $("#"+id_hj3+id)
      .val()
      .replace(".00", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "");
      
  if(code == id_hj){
  var laba = parseInt(harga_jual) - parseInt(harga_pokok);
  var n_proc = (laba / parseInt(harga_pokok)) * 100;
  var n_jual = harga_jual;
  $("#"+id_proc+''+id).val(currency(parseInt(n_proc)).format().replace("$", ""));
  $("#"+id_hj+''+id).val(currency(parseInt(n_jual)).format().replace("$", ""));

  }else if(code == id_hj2){
  var laba2 = parseInt(harga_jual2) - parseInt(harga_pokok);
  var n_proc2 = (laba2 / parseInt(harga_pokok)) * 100;
  var n_jual2 = harga_jual2;
  $("#"+id_proc2+''+id).val(currency(parseInt(n_proc2)).format().replace("$", ""));
  $("#"+id_hj2+''+id).val(currency(parseInt(n_jual2)).format().replace("$", ""));
  
}else if(code == id_hj3){
  var laba3 = parseInt(harga_jual3) - parseInt(harga_pokok);
  var n_proc3 = (laba3 / parseInt(harga_pokok)) * 100;
  var n_jual3 = harga_jual3;
  $("#"+id_proc3+''+id).val(currency(parseInt(n_proc3)).format().replace("$", ""));
  $("#"+id_hj3+''+id).val(currency(parseInt(n_jual3)).format().replace("$", ""));

  }else if(code == id_proc){    
  var laba = (parseInt(proc) * parseInt(harga_pokok)) / 100;
  var n_jual = (parseInt(harga_pokok) + parseInt(laba))
  var n_proc = proc;
  $("#"+id_proc+''+id).val(currency(parseInt(n_proc)).format().replace("$", ""));
  $("#"+id_hj+''+id).val(currency(parseInt(n_jual)).format().replace("$", ""));
    
  }else if(code == id_proc2){    
  var laba2 = (parseInt(proc2) * parseInt(harga_pokok)) / 100;
  var n_jual2 = (parseInt(harga_pokok) + parseInt(laba2))
  var n_proc2 = proc2;
  $("#"+id_proc2+''+id).val(currency(parseInt(n_proc2)).format().replace("$", ""));
  $("#"+id_hj2+''+id).val(currency(parseInt(n_jual2)).format().replace("$", ""));
    
  }else if(code == id_proc3){    
  var laba3 = (parseInt(proc3) * parseInt(harga_pokok)) / 100;
  var n_jual3 = (parseInt(harga_pokok) + parseInt(laba3))
  var n_proc3 = proc3;
  $("#"+id_proc3+''+id).val(currency(parseInt(n_proc3)).format().replace("$", ""));
  $("#"+id_hj3+''+id).val(currency(parseInt(n_jual3)).format().replace("$", ""));
    
  }else if(code == id_hp){
    if(proc != 0){
    var laba = (parseInt(proc) * parseInt(harga_pokok)) / 100;
    var n_jual = (parseInt(harga_pokok) + parseInt(laba))
    var n_proc = proc;

    }else{
    var n_jual = parseInt(harga_pokok);
    var n_proc = proc;
    }

    if(proc2 != 0){
    var laba2 = (parseInt(proc2) * parseInt(harga_pokok)) / 100;
    var n_jual2 = (parseInt(harga_pokok) + parseInt(laba2))
    var n_proc2 = proc2;
    }else{
    var n_jual2 = parseInt(harga_pokok);
    var n_proc2 = proc2;
    }
    
    if(proc3 != 0){
    var laba3 = (parseInt(proc3) * parseInt(harga_pokok)) / 100;
    var n_jual3 = (parseInt(harga_pokok) + parseInt(laba3))
    var n_proc3 = proc3;
    }else{
    var n_jual3 = parseInt(harga_pokok);
    var n_proc3 = proc3;
    }

  $("#"+id_proc+''+id).val(currency(parseInt(n_proc)).format().replace("$", ""));
  $("#"+id_proc2+''+id).val(currency(parseInt(n_proc2)).format().replace("$", ""));
  $("#"+id_proc3+''+id).val(currency(parseInt(n_proc3)).format().replace("$", ""));
  $("#"+id_hj+''+id).val(currency(parseInt(n_jual)).format().replace("$", ""));
  $("#"+id_hj2+''+id).val(currency(parseInt(n_jual2)).format().replace("$", ""));
  $("#"+id_hj3+''+id).val(currency(parseInt(n_jual3)).format().replace("$", ""));
  }
  
  
}

function hitung_currency_purchase_item(id,code, val) {
  id_code = code+''+id;
  set_currency_value(id_code, val);
  hitung_purchase_item(id,code);
}
function hitung_purchase_item(id,code){
  id_jml = 5001;
  id_jml_terima = 5002;
  id_harga = 5003;
  id_pot = 5004;
  id_total = 5005;

  var jml = $("#"+id_jml+id)
      .val()
      .replace(".00", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "");

  var jml_terima = $("#"+id_jml_terima+id)
      .val()
      .replace(".00", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "");
    
  var harga = $("#"+id_harga+id)
      .val()
      .replace(".00", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "");
    
  var pot = $("#"+id_pot+id)
      .val()
      .replace(".00", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "")
      .replace(",", "");
    

    if(pot != 0){
      var laba = (parseInt(pot) * parseInt(harga)) / 100;
      var proc = (parseInt(harga) - parseInt(laba))
      var total = (parseInt(jml) * parseInt(proc));

    }else{
      var total = (parseInt(jml) * parseInt(harga));
    }
    $("#"+id_total+''+id).val(currency(parseInt(total)).format().replace("$", ""));
   
}
