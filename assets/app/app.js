var base_url = location.origin +"/" ;
// if(base_url == 'http://localhost/' || base_url == 'https://localhost/' ){
    base_url = base_url + "Inventori_Sekolah/" ;  
// }

var datanext = 0, dataprev = 0;
var request = {} , act = "" , successfunc = "" , getfunc = "" , reqs = {};

function GetDropdownPengajuan(selected, kategori, successfunc) {
    selected = (typeof selected !== 'undefined') ?  selected : "";
    successfunc = (typeof successfunc !== 'undefined') ?  successfunc : "";
    request["Sort"] = "id desc";
    req = request;
    $.ajax({
        type: "POST",
        url: base_url + "/Pengajuan/Ajax_pengajuan/pengajuan_dropdown",
        data: {req:req},
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            if(resp.lsdt && resp.lsdt != "undefined") {
                var result  = "";
                result += resp.lsdt;
                $(".dropdown-pengajuanbarang").html(result);
                if(selected != "") {
                    $(".dropdown-pengajuanbarang").val(selected).trigger("change");
                }
                // if(successfunc != "") {
                //     successfunc(resp);
                // }
            }if(successfunc != "") {
                successfunc(resp);
            }
            $(".select2.dropdown-pengajuanbarang").select2({
                disabled: false,
                placeholder: "Pilih Barang"
            });
        },
        error: function(xhr, textstatus, errorthrown) {
            $(".select2.dropdown-kategoribarang").select2({
                disabled: true,
                placeholder: "Periksa koneksi internet anda kembali",
            });
        }
    });
}

function GetDropdownBidang(selected, kategori , successfunc) {
    selected = (typeof selected !== 'undefined') ?  selected : "";
    successfunc = (typeof successfunc !== 'undefined') ?  successfunc : "";
    request["Sort"] = "id desc";
    req = request;
    $.ajax({
        type: "POST",
        url: base_url + "/Jurusan/Ajax_jurusan/bidang_dropdown",
        data: {req:req},
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            if(resp.lsdt && resp.lsdt != "undefined") {
                var result  = "<option value=''>Pilih Bidang Keahlian</option>";
                result += resp.lsdt;
                $(".dropdown-bidang").html(result);
                if(selected != "") {
                    $(".dropdown-bidang").val(selected).trigger("change");
                }
                // if(successfunc != "") {
                //     successfunc(resp);
                // }
            }if(successfunc != "") {
                successfunc(resp);
            }
            $(".select2.dropdown-bidang").select2({
                disabled: false,
                placeholder: "Pilih Bidang"
            });
        },
        error: function(xhr, textstatus, errorthrown) {
            $(".select2.dropdown-bidang").select2({
                disabled: true,
                placeholder: "Periksa koneksi internet anda kembali",
            });
        }
    });
}

function GetDropdownJurusan(selected, kategori , successfunc) {
    selected = (typeof selected !== 'undefined') ?  selected : "";
    successfunc = (typeof successfunc !== 'undefined') ?  successfunc : "";
    request["Sort"] = "id desc";
    req = request;
    $.ajax({
        type: "POST",
        url: base_url + "/Jurusan/Ajax_jurusan/jurusan_dropdown",
        data: {req:req},
        dataType: "JSON",
        before:function(){
            $(".select2.dropdown-jurusan").hide();
        },
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            if(resp.lsdt && resp.lsdt != "undefined") {
                var result  = "<option value=''>Pilih  jurusan</option>";
                result += resp.lsdt;
                $(".dropdown-jurusan").html(result);
                if(selected != "") {
                    $(".dropdown-jurusan").val(selected).trigger("change");
                }
                // if(successfunc != "") {
                //     successfunc(resp);
                // }
            }if(successfunc != "") {
                successfunc(resp);
            }
            $(".select2.dropdown-jurusan").select2({
                disabled: false,
            });
            $(".select2.dropdown-jurusan").show();

        },
        error: function(xhr, textstatus, errorthrown) {
            $(".select2.dropdown-jurusan").select2({
                disabled: true,
                placeholder: "Periksa koneksi internet anda kembali",
            });
        }
    });
}


function GetDropdownKategori(selected, kategori, successfunc) {
    selected = (typeof selected !== 'undefined') ?  selected : "";
    successfunc = (typeof successfunc !== 'undefined') ?  successfunc : "";
    request["Sort"] = "jenis_barang asc";
    req = request;
    $.ajax({
        type: "POST",
        url: base_url + "/Barang/Ajax_barang/jenis_dropdown",
        data: {req:req},
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            if(resp.lsdt && resp.lsdt != "undefined") {
                var result  = "<option kode='' value=''>Pilih Kategori</option>";
                result += resp.lsdt;
                $(".dropdown-kategoribarang").html(result);
                if(selected != "") {
                    $(".dropdown-kategoribarang").val(selected).trigger("change");
                }
                // if(successfunc != "") {
                //     successfunc(resp);
                // }
            }if(successfunc != "") {
                successfunc(resp);
            }
            $(".select2.dropdown-kategoribarang").select2({
                disabled: false
            });
        },
        error: function(xhr, textstatus, errorthrown) {
            $(".select2.dropdown-kategoribarang").select2({
                disabled: true,
                placeholder: "Periksa koneksi internet anda kembali",
            });
        }
    });
}

function GetDropdownSatuan(selected, kategori, successfunc) {
    selected = (typeof selected !== 'undefined') ?  selected : "";
    successfunc = (typeof successfunc !== 'undefined') ?  successfunc : "";
    // request["Sort"] = "satuan_barang asc";
    req = {"Sort" :"satuan_barang asc"};
    $.ajax({
        type: "POST",
        url: base_url + "/Barang/Ajax_barang/satuan_dropdown",
        data: {req:req},
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            if(resp.lsdt && resp.lsdt != "undefined") {
                var result  = "<option kode='' value=''>Pilih Satuan</option>";
                result += resp.lsdt;
                $(".dropdown-satuanbarang").html(result);
                if(selected != "") {
                    $(".dropdown-satuanbarang").val(selected).trigger("change");
                }

            }
            if(successfunc != "") {
                successfunc(resp);
            }
            $(".select2.dropdown-satuanbarang").select2({
                disabled: false
            });
        },
        error: function(xhr, textstatus, errorthrown) {
            $(".select2.dropdown-satuanbarang").select2({
                disabled: true,
                placeholder: "Periksa koneksi internet anda kembali",
            });
        }
    });
}

function GetDropdownSumber(selected, kategori, successfunc) {
    selected = (typeof selected !== 'undefined') ?  selected : "";
    successfunc = (typeof successfunc !== 'undefined') ?  successfunc : "";
    // request["Sort"] = "sumber_barang asc";
    req = {"Sort" : "sumber_barang asc"};
    $.ajax({
        type: "POST",
        url: base_url + "/Barang/Ajax_barang/sumber_dropdown",
        data: {req:req},
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            if(resp.lsdt && resp.lsdt != "undefined") {
                var result  = "<option kode='' value=''>Pilih Sumber</option>";
                result += resp.lsdt;
                $(".dropdown-sumberbarang").html(result);
                if(selected != "") {
                    $(".dropdown-sumberbarang").val(selected).trigger("change");
                }
                // if(successfunc != "") {
                //     successfunc(resp);
                // }
            }
            if(successfunc != "") {
                successfunc(resp);
            }
            $(".select2.dropdown-sumberbarang").select2({
                disabled: false
            });
        },
        error: function(xhr, textstatus, errorthrown) {
            $(".select2.dropdown-sumberbarang").select2({
                disabled: true,
                placeholder: "Periksa koneksi internet anda kembali",
            });
        }
    });
}

function GetDropdownBarang(selected, kategori, successfunc) {
    selected = (typeof selected !== 'undefined') ?  selected : "";
    successfunc = (typeof successfunc !== 'undefined') ?  successfunc : "";
    req = {"Sort" : "nama asc"};
    $.ajax({
        type: "POST",
        url: base_url + "/Barang/Ajax_barang/barang_dropdown",
        data: {req:req},
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            if(resp.lsdt && resp.lsdt != "undefined") {
                var result  = "<option jml_sisa='' kode='' value=''>Pilih Barang</option>";
                result += resp.lsdt;
                $(".dropdown-barang").html(result);
                if(selected != "") {
                    $(".dropdown-barang").val(selected).trigger("change");
                }
                // if(successfunc != "") {
                //     successfunc(resp);
                // }
            }
            if(successfunc != "") {
                successfunc(resp);
            }
            $(".select2.dropdown-barang").select2({
                disabled: false
            });
        },
        error: function(xhr, textstatus, errorthrown) {
            $(".select2.dropdown-barang").select2({
                disabled: true,
                placeholder: "Periksa koneksi internet anda kembali",
            });
        }
    });
}

function GetDropdownSupplier(selected, kategori, successfunc) {
    selected = (typeof selected !== 'undefined') ?  selected : "";
    successfunc = (typeof successfunc !== 'undefined') ?  successfunc : "";
    request["Sort"] = "supplier asc";
    req = request;
    $.ajax({
        type: "POST",
        url: base_url + "/Stok/Ajax_stok/supplier_dropdown",
        data: {req:req},
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            if(resp.lsdt && resp.lsdt != "undefined") {
                var result  = "<option kode='' value=''>Pilih supplier</option>";
                result += resp.lsdt;
                $(".dropdown-supplier").html(result);
                if(selected != "") {
                    $(".dropdown-supplier").val(selected).trigger("change");
                }
                // if(successfunc != "") {
                //     successfunc(resp);
                // }
            }
            if(successfunc != "") {
                successfunc(resp);
            }
            $(".select2.dropdown-supplier").select2({
                disabled: false
            });
        },
        error: function(xhr, textstatus, errorthrown) {
            $(".select2.dropdown-supplier").select2({
                disabled: true,
                placeholder: "Periksa koneksi internet anda kembali",
            });
        }
    });
}

function GetDropdownPelanggan(selected, kategori, successfunc) {
    selected = (typeof selected !== 'undefined') ?  selected : "";
    successfunc = (typeof successfunc !== 'undefined') ?  successfunc : "";
    request["Sort"] = "id desc";
    req = request;
    $.ajax({
        type: "POST",
        url: base_url + "/Action/Ajax_action/pelanggan_dropdown",
        data: {req:req},
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            if(resp.lsdt && resp.lsdt != "undefined") {
                var result  = "<option kode='' value=''>Pilih Pelanggan</option>";
                result += resp.lsdt;
                $(".dropdown-pelanggan").html(result);
                if(selected != "") {
                    $(".dropdown-pelanggan").val(selected).trigger("change");
                }
                // if(successfunc != "") {
                //     successfunc(resp);
                // }
            }
            if(successfunc != "") {
                successfunc(resp);
            }
            $(".select2.dropdown-pelanggan").select2({
                disabled: false
            });
        },
        error: function(xhr, textstatus, errorthrown) {
            $(".select2.dropdown-pelanggan").select2({
                disabled: true,
                placeholder: "Periksa koneksi internet anda kembali",
            });
        }
    });
}


function DeleteData(selectorform, successfunc, errorfunc) {
    successfunc = (typeof successfunc !== 'undefined') ?  successfunc : "";
    errorfunc = (typeof errorfunc !== 'undefined') ?  errorfunc : "";
    var formdata   = $(selectorform).serialize() ;
    $.ajax({
        type: "POST",
        url: base_url + page + "delete",
        data: formdata,
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3, 
        success: function(resp){
            if(resp.IsError == false) {
                $(".modal").modal("hide");
                toastrshow("success", "Data berhasil dihapus", "Success");
                if(successfunc != "") {
                    successfunc(resp);
                }
            } else {
                toastrshow("error", resp.ErrMessage, "Error");
                setTimeout(function(){
                    if(resp.ErrMessage == "Sesi User telah habis atau Pengguna lainnya telah login"){
                        window.location.href = base_url + "/login/session_token_expired.html";
                    }
                }, 500);
            }
        },
        error: function(xhr, textstatus, errorthrown) {
            setTimeout(function(){
                // $(".modal").modal("hide");
                toastrshow("warning", "Periksa koneksi internet anda kembali", "Peringatan");
            }, 500);
        }
    });
}

function UpdateData(selectorform, successfunc, errorfunc) {
    successfunc = (typeof successfunc !== 'undefined') ?  successfunc : "";
    errorfunc = (typeof errorfunc !== 'undefined') ?  errorfunc : "";
    var formdata   = $(selectorform).serialize() ;
    $.ajax({
        type: "POST",
        url: base_url + page + "edit",
        data: formdata,
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            if(resp.IsError == false) {
                toastrshow("success", "Data berhasil disimpan", "Success");
                $(selectorform).parents(".modal").modal("hide"); //Tutup modal
                if(successfunc != "") {
                    successfunc(resp);
                }
            } else {
                toastrshow("error", resp.ErrMessage, "Error");
                if(errorfunc != "") {
                    errorfunc();
                }
            }
        },
        error: function(xhr, textstatus, errorthrown) {
            setTimeout(function(){
                // $(".modal").modal("hide");
                toastrshow("warning", "Periksa koneksi internet anda kembali", "Peringatan");
            }, 500);
        }
    });
}

function InsertData(selectorform, successfunc, errorfunc) {
    successfunc = (typeof successfunc !== 'undefined') ?  successfunc : "";
    errorfunc = (typeof errorfunc !== 'undefined') ?  errorfunc : "";
    var formdata   = $(selectorform).serialize() ;
    $.ajax({
        type: "POST",
        url: base_url + page + "add",
        data: formdata,
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            if(resp.IsError == false) {
                toastrshow("success", "Data berhasil disimpan", "Success");
                $(selectorform).parents(".modal").modal("hide"); //Tutup modal
                if(successfunc != "") {
                    successfunc(resp);
                }
            } else {
                toastrshow("error", resp.ErrMessage, "Error");
                if(errorfunc != "") {
                    errorfunc();
                }
            }
        },
        error: function(xhr, textstatus, errorthrown) {
            setTimeout(function(){
                // $(".modal").modal("hide");
                toastrshow("warning", "Periksa koneksi internet anda kembali", "Peringatan");
            }, 500);
        }
    });
}

function GetData(req , table, successfunc) {
    req = (typeof req !== 'undefined') ?  req : "";
    successfunc = (typeof successfunc !== 'undefined') ?  successfunc : "";
    req["Sort"] = (typeof req['Sort'] !== 'undefined' || !empty(req['Sort']) ) ?req['Sort'] :  "id desc"  ;
    // $("html").removeClass('rg-scrollbar-on');
    $(".datatable-"+table+" tbody").html(loader(true));
    $.ajax({
        type: "POST",
        url: base_url + page + "tablelist.html",
        data: { req:req},
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            if(resp.lsdt == "SESSION"){
                window.location.href = base_url + "/login/session_token_expired.html";
            } else {
                // $("html").addClass('perfect-scrollbar-on');
                if(resp.Paging.Total != undefined) {
                    $(".datatable-"+table+" tbody").html(resp.lsdt);
                    pagination(resp.Paging, table);
                    if(successfunc != "") {
                        getfunc = successfunc;
                        successfunc(resp);
                    }
                } else {
                    $(".datatable-"+table+" tbody").html(resp.lsdt);
                    $(".pagination-setting-"+table).addClass("hidden");
                    if(successfunc != "") {
                        getfunc = successfunc;
                        successfunc(resp);
                    }
                }
            }
            
        },
        error: function(xhr, textstatus, errorthrown) {
            $(".datatable-"+table+" tbody").html("<tr><td colspan='10' class='text-center'><span class='label label-warning'>Periksa koneksi internet anda kembali</span></td></tr>");
            $(".pagenation-setting-"+table).addClass("hidden");
        }
    });
}

function GetDataById(req , successfunc=""){
    $.ajax({
        type: "POST",
        url: base_url + page + "list",
        data: { req:req},
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            if(resp.lsdt == "SESSION"){
                window.location.href = base_url + "/login/session_token_expired.html";
            } else {
                if(successfunc!=""){
                    successfunc(resp) ;
                }
            }   
        },
        error: function(xhr, textstatus, errorthrown) {
            toastrshow("error" ,"Kesalahan" , "Cek Koneksi Anda")
        }
    });
}

function pagination(page, table) {
    var paginglayout = $(".pagination-setting-"+table);
    var infopage = page.InfoPage+" Records | "+page.JmlHalTotal+" Pages";
    
    paginglayout.removeClass("hidden");
    paginglayout.find("input[type='text']").val(Number(page.HalKe));
    paginglayout.find(".pagination-info").html(infopage);
    if(page.IsNext == true) {
        paginglayout.find(".btn-next, .next-head").removeClass("disabled");
        paginglayout.find(".btn-last").removeClass("disabled");
        paginglayout.find(".btn-last").attr("lastpage", page.JmlHalTotal);
        datanext = (Number(page.HalKe) + 1);
    } else {
        paginglayout.find(".btn-next, .next-head").addClass("disabled");
        paginglayout.find(".btn-last").addClass("disabled");
        dataprev = 0;
    }
    if(page.IsPrev == true) {
        paginglayout.find(".btn-prev, .prev-head").removeClass("disabled");
        paginglayout.find(".btn-first").removeClass("disabled");
        dataprev = (Number(page.HalKe) - 1);
    } else {
        paginglayout.find(".btn-prev, .prev-head").addClass("disabled");
        paginglayout.find(".btn-first").addClass("disabled");
        dataprev = 0;
    }
}

function Change_file($file){
    return base_url+"/file/"+$file ;
}

$(".btn-next").click(function() {
    page = $(this).parent().parent().parent().parent().attr("page");
    var table = $(this).parent().parent().parent().parent().attr("class");
    table = table.replace(/pagination-setting-/g, "", table);
    request["Page"] = datanext;
    console.log(table);
    GetData(request, table, getfunc);
});

$(".btn-prev").click(function() {
    page = $(this).parent().parent().parent().parent().attr("page");
    var table = $(this).parent().parent().parent().parent().attr("class");
    table = table.replace(/pagination-setting-/g, "", table);
    request["Page"] = dataprev;
    GetData(request, table, getfunc);
});

$(".btn-first").click(function() {
    var table = $(this).parent().parent().parent().parent().attr("class");
    table = table.replace(/pagination-setting-/g, "", table);
    request["Page"] = 1;
    page = $(this).parent().parent().parent().parent().attr("page");
    console.log(table);
    GetData(request, table, getfunc);
});
$(".btn-last").click(function() {
    var table = $(this).parent().parent().parent().parent().attr("class");
    table = table.replace(/pagination-setting-/g, "", table);
    request["Page"] = $(this).attr('lastpage');
    page = $(this).parent().parent().parent().parent().attr("page");
    GetData(request, table, getfunc);
});

$("#Goto").submit(function() {
    var table = $(this).parent().parent().parent().parent().attr("class");
    table = table.replace(/pagination-setting-/g, "", table);
    var page = $(this).find("input[type='text']").val();
    request["Page"] = page;
    page = $(this).parent().parent().parent().parent().attr("page");
    GetData(request, table, getfunc);
    return false;
});

$("#FormSearch").submit(function() {
    var table = $(this).attr("table");
    request["Page"] = 1;
    request["search"] =  $(this).find("input[type='text']").val() ;
    page = $(this).attr("page");
    GetData(request, table, getfunc);
    return false;
});

function loader(withtable) {
    withtable = (typeof withtable !== 'undefined') ?  withtable : false;
    var html  = '';
    if(withtable == true) html += "<tr><td colspan='10' class='text-center'>";
    html += '<center><img class="loading-gif-image" src="'+base_url+'/assets/img/loading-data.gif" alt="Loading ..."></center>';
    if(withtable == true) html += "</td><td>";
    return html;
}

$(".no , input[type=number] ").attr("onkeypress","return isNumber(event)");



$(".loading-gif-image").attr('src', base_url+"/assets/img/loading-data.gif");

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

function in_array(search, array, column) {
    if(empty(column)) {
        column = "";
    }

    var length = array.length;
    for(var i = 0; i < length; i++) {
        if(!empty(column)) {
            if(array[i][column] == search) return true;
        } else {
            if(array[i] == search) return true;
        }
    }
    return false;
}


function empty(string) {
  return (string == undefined || string == "" || string == null);
}

function resetvalue(selector){
    $(selector).find("select").val("").trigger("change") ;
    $(selector).find("input").val("");
}

function toastrshow(type, title, message) {
    message = (typeof message !== 'undefined') ?  message : "";
    toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: "slideDown",
        positionClass: "toast-top-right",
        timeOut: 3000,
        onclick: null,
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
    }
    switch(type) {
        case "success" : toastr["success"](title, message);  break;
        case "info"    : toastr["info"](title, message);     break;
        case "warning" : toastr["warning"](title, message);  break;
        case "error"   : toastr["error"](title, message);    break;
        default        : toastr["info"](title, message);     break;
    }
}

$(".modal").on('hide.bs.modal',  function(event) {
    $(this).find('input').val("");
    $(this).find('select').val("").trigger('change');
    $(this).find('textarea').val("").trigger('change');
    $(this).find('.loading-data').removeClass('hidden');
});

var edit_jenisbarang = $("#jenis_edit") ;
var delete_jenisbarang = $("#jenis_delete") ;

$(".datatable-jenisbarang tbody").on("click", ".edit-data", function() {
    reqs['id'] = $(this).attr('data-id');
    GetDataById(reqs,function(resp){
        var modal_edit = $("#jenis_edit");
        if(resp.Data!=[]){
            $.each(resp.Data[0], function(index, val) {
                modal_edit.find("#"+index).val(val)
            });
        }
        modal_edit.find('.id_jenis').val(reqs['id']);
        modal_edit.find('.loading-data').addClass('hidden');
        modal_edit.find('.form-edit').removeClass('hidden');
        modal_edit.find('#jenis_barang').attr('autofocus', 'true');
    })
});

$(".datatable-jenisbarang tbody").on("click", ".delete-data", function() {
    id = $(this).attr('data-id');
    name = $(this).attr('data-name');
    delete_jenisbarang.find('.id_jenis').val(id);
    delete_jenisbarang.find('p').html("Anda Yakin menghapus '"+name+"' ?");
});

var edit_satuanbarang = $("#satuan_edit");
var delete_satuanbarang = $("#satuan_delete");

$(".datatable-satuanbarang tbody").on("click", ".delete-data", function() {
    id = $(this).attr('data-id');
    name = $(this).attr('data-name');
    delete_satuanbarang.find('.id_jenis').val(id);
    delete_satuanbarang.find('p').html("Anda Yakin menghapus '"+name+"' ?");
});

$(".datatable-satuanbarang tbody").on("click", ".edit-data", function() {
    reqs['id'] = $(this).attr('data-id');
    GetDataById(reqs,function(resp){
        var modal_edit = $("#satuan_edit");
        if(resp.Data!=[]){
            $.each(resp.Data[0], function(index, val) {
                modal_edit.find("#"+index).val(val)
            });
        }
        modal_edit.find('.id_satuan').val(reqs['id']);
        modal_edit.find('.loading-data').addClass('hidden');
        modal_edit.find('.form-edit').removeClass('hidden');
        modal_edit.find('#satuan_barang').attr('autofocus', 'true');
    })
});

var edit_sumberbarang = $("#sumber_edit");
var delete_sumberbarang = $("#sumber_delete");

$(".datatable-sumberbarang tbody").on("click", ".delete-data", function() {
    id = $(this).attr('data-id');
    name = $(this).attr('data-name');
    delete_sumberbarang.find('.id_jenis').val(id);
    delete_sumberbarang.find('p').html("Anda Yakin menghapus '"+name+"' ?");
});

$(".datatable-sumberbarang tbody").on("click", ".edit-data", function() {
    reqs['id'] = $(this).attr('data-id');
    GetDataById(reqs,function(resp){
        var modal_edit = $("#sumber_edit");
        if(resp.Data!=[]){
            $.each(resp.Data[0], function(index, val) {
                modal_edit.find("#"+index).val(val)
            });
        }
        modal_edit.find('.id_sumber').val(reqs['id']);
        modal_edit.find('.loading-data').addClass('hidden');
        modal_edit.find('.form-edit').removeClass('hidden');
        modal_edit.find('#sumber_barang').attr('autofocus', 'true');
    })
});

var edit_barang = $("#barang_edit");
var delete_barang = $("#barang_delete");

$(".datatable-barang tbody").on("click", ".delete-data", function() {
    id = $(this).attr('data-id');
    name = $(this).attr('data-name');
    delete_barang.find('.id_barang').val(id);
    delete_barang.find('p').html("Anda Yakin menghapus '"+name+"' ?");
});

$(".datatable-barang tbody").on("click", ".edit-data", function() {
    reqs['id'] = $(this).attr('data-id');
    GetDataById(reqs,function(resp){
        var modal_edit = $("#barang_edit");
        resp = resp.Data[0];
        modal_edit.find('#dnama').val(resp.nama);
        modal_edit.find('#Spesifikasi').val(resp.spesifikasi);
        modal_edit.find('.dropdown-kategoribarang').val(resp.id_kategori).trigger('change');
        modal_edit.find('.dropdown-sumberbarang').val(resp.id_sumber).trigger('change');
        modal_edit.find('.dropdown-satuanbarang').val(resp.id_satuan).trigger('change');
        modal_edit.find('#kode_barang').val(resp.kode_barang);
        modal_edit.find('.id_barang').val(reqs['id']);
        modal_edit.find('.loading-data').addClass('hidden');
        modal_edit.find('.form-edit').removeClass('hidden');
        modal_edit.find('#dnama').attr('autofocus', 'true');
    })
});

var edit_supplier = $("#supplier_edit");
var delete_supplier = $("#supplier_delete");

$(".datatable-supplier tbody").on("click", ".delete-data", function() {
    id = $(this).attr('data-id');
    name = $(this).attr('data-name');
    $("#supplier_delete").find('.id_supplier').val(id);
    $("#supplier_delete").find('p').html("Anda Yakin menghapus '"+name+"' ?");
});

$(".datatable-supplier tbody").on("click", ".edit-data", function() {
    reqs['id'] = $(this).attr('data-id');
    GetDataById(reqs,function(resp){
        var modal_edit = $("#supplier_edit");
        if(resp.Data!=[]){
            $.each(resp.Data[0], function(index, val) {
                modal_edit.find("#"+index).val(val)
            });
        }
        modal_edit.find('#id_barang').val(resp.Data[0].id_barang).trigger('change');
        modal_edit.find('.id_supplier').val(reqs['id']);
        modal_edit.find('.loading-data').addClass('hidden');
        modal_edit.find('.form-edit').removeClass('hidden');
        modal_edit.find('#supplier').attr('autofocus', 'true');
    })
});

var max_jml = 0 ;

var modal_get_barang = $("#mdl-pinjam");

$(".datatable-barang tbody").on("click", ".btn-pinjam", function() {
    reqs['id']  = $(this).attr('data-id');
    modal_get_barang.find('.id_barang')
    GetDataById(reqs,function(resp){
        resp = resp.Data[0] ;
        modal_get_barang.find('.title-pinjam').html("Pinjam : "+ resp.nama +" ("+resp.kode_barang+")" ) ;
        modal_get_barang.find('.satuan-barang').html(resp.satuan_barang) ;
        max_jml = resp.stok_barang - resp.jml_dipinjam ;
    })
});

modal_get_barang.on('change keyup' , "#jml", function(event) {
    isi_jumlah = parseInt($(this).val()) ;
    console.log(isi_jumlah);
    jml_1 =($(this).val());
    if(empty(jml_1) || jml_1=="NaN"){
        jml_1 = 0 ;
    }
    if(isi_jumlah>max_jml && jml_1 != 0){
        $(this).val(max_jml);
    }else if(jml_1 == 0){
        $(this).val("");
    }
});

var edit_supplier = $("#pelanggan_edit");
var delete_supplier = $("#pelanggan_delete");

$(".datatable-pelanggan tbody").on("click", ".delete-data", function() {
    id = $(this).attr('data-id');
    name = $(this).attr('data-name');
    delete_supplier.find('.id_pelanggan').val(id);
    delete_supplier.find('p').html("Anda Yakin menghapus '"+name+"' ?");
});

$(".datatable-pelanggan tbody").on("click", ".edit-data", function() {
    reqs['id'] = $(this).attr('data-id');
    GetDataById(reqs,function(resp){
        var modal_edit = $("#pelanggan_edit");
        if(resp.Data!=[]){
            $.each(resp.Data[0], function(index, val) {
                modal_edit.find("#"+index).val(val)
            });
        }


        modal_edit.find('#id_kategori').val(resp.Data[0].kategori).trigger('change');
        modal_edit.find('.id_pelanggan').val(reqs['id']);
        modal_edit.find('.loading-data').addClass('hidden');
        modal_edit.find('.form-edit').removeClass('hidden');
        // modal_edit.find('#supplier').attr('autofocus', 'true');
    })
});

$(".datatable-barang tbody").on("click", ".btn-pinjam", function() {
    reqs['id'] = $(this).attr('data-id');
    $("#mdl-pinjam").find('.id_barang').val(reqs['id']) ;
});

$(".datatable-peminjaman tbody").on("click", ".btn-kembali", function() {
    reqs['id'] = $(this).attr('data-id');
    var jml = $(this).attr('data-jml');
    $("#mdl-kembali").find('.title-kembali').html("Kembali : "+reqs['id']) ;
    $("#mdl-kembali").find('.kode').val(reqs['id']) ;
    $("#mdl-kembali").find('#jml').val(jml) ;
});

$(".cetak-pdf-stok").click(function(event) {
    // window.location =  ;
    window.open(base_url+"Laporan/pdf_stok_barang.html" , "","");
});

$(".datatable-masuk tbody").on("click", ".data-detail", function() {
    reqs['no_penerimaan'] = $(this).attr('data-id');
    page = "/Stok/Ajax_stok/masukdetail_";
    GetData(reqs, "detail-masuk"); 
});

$(".datatable-keluar tbody").on("click", ".data-detail", function() {
    reqs['no_keluaran'] = $(this).attr('data-id');
    page = "/Stok/Ajax_stok/keluardetail_";
    GetData(reqs, "detail-keluar"); 
});

$(".datatable-userjurusan tbody").on("click", ".edit-data", function() {
    reqs['id'] = $(this).attr('data-id');
    GetDataById(reqs,function(resp){
        var modal_edit = $("#userjurusan_edit");
        if(resp.Data!=[]){
            $.each(resp.Data[0], function(index, val) {
                modal_edit.find("input[name="+index+"]").val(val)
            });
        }
        modal_edit.find('select[name=jabatan]').val(resp.Data[0].jabatan).trigger('change');
        modal_edit.find('select[name=jurusan]').val(resp.Data[0].jurusan_id).trigger('change');
    })
});

$(".datatable-userjurusan tbody").on("click", ".delete-data", function() {
    id = $(this).attr('data-id');
    name = $(this).attr('data-name');
    $("#userjurusan_delete").find('.id').val(id);
    $("#userjurusan_delete").find('p').html("Anda Yakin menghapus '"+name+"' ?");
});

$(".datatable-pengajuan tbody").on("click", ".upload-kap", function() {
    id = $(this).attr('data-id');
    name = $(this).attr('data-name');
    $("#upload").find('.id').val(id);
});

$(".datatable-pengajuan tbody").on("click", ".edit-status", function() {
    id = $(this).attr('data-id');
    reqs = {"kode_id" : id };
    page = "/Pengajuan/Ajax_pengajuan/pengajuan_editstatus_";
    GetData(reqs, "detail-kaprokal",function(){
        $(".select2").select2();
    });
    $("#EditStatus").find('.id').val(id);
});

$(".datatable-pengajuan tbody").on("click", ".data-print-kaprokal", function() {
    id = $(this).attr('link');
    window.open(id, "","width=1050,height=580");
});
$(".datatable-pengajuan tbody").on("click", ".data-detail-kaprokal", function() {
    id = $(this).attr('data-id');
    reqs = {"kode_id" : id };
    page = "/Pengajuan/Ajax_pengajuan/pengajuan_detail_";
    GetData(reqs, "detail-kaprokal",function(){
    });
});