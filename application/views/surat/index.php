<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php 
		$this->config->load('siskae_config',TRUE);
		$app = $this->config->item('app_name','siskae_config');
    $mulai = $this->config->item('mulai','siskae_config');
	?>
  <title><?php echo $app; ?> | Surat</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php $this->load->view("_partials/css.php") ?>
  <!-- datatables -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/plugin/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/plugin/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
  <!-- lightbox -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/plugin/lightbox2/dist/css/lightbox.min.css'); ?>">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php $this->load->view("_partials/navbar.php") ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php $this->load->view("_partials/sidebar_container.php") ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Surat</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item active">Surat</li>
            </ol>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-sm-2">
            <a href="surat/tambah" class="btn btn-block bg-gradient-primary">
              <i class="fas fa-plus"></i>Tambah
            </a>
          </div>
        </div>
        <div class="row-mb-2">
          <div class="col-sm-12" id="respon">
            <!-- <div class="alert alert-success" role="alert" id="responMsg" style="display: none;"> -->
              
            </div>
          </div>
        
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">              
              <div class="card card-primary">
                <div class="card-body">
                  <form class="form-inline mb-3">
                    <div class="form-check form-check-inline">
                      <label for="kode" class="form-check-label mr-2">Kode Surat</label>
                      <select name="selectKode" id="selectKode" class="form-inline"></select>
                    </div>
                    <div class="form-check form-check-inline">
                      <label for="jenis" class="form-check-label mr-2">Jenis Surat</label>
                      <select name="selectJenis" id="selectJenis" class="form-inline"></select>
                    </div>                    
                    <div class="form-check form-check-inline mt-2 mb-2">
                      <label for="tMulai" class="form-check-label mr-2">Tanggal Mulai :</label>
                      <input type="date" class="form-check-input" id="tMulai" value="<?php echo $mulai; ?>">
                    </div>
                    <div class="form-check form-check-inline mt-2 mb-2">
                      <label for="tAkhir" class="form-check-label mr-2">Tanggal Akhir :</label>
                      <input type="date" class="form-check-input" id="tAkhir" value="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div class="form-check form-check-inline">
                      <input type="button" class="btn btn-success mr-2 mt-2 mb-2" value="Filter" id="bFilter">
                      <input type="button" class="btn btn-danger mr-2 mt-2 mb-2" value="Reset" id="bReset">
                    </div>
                  </form>
                  <table id="dt_surat" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th></th>
                        <th>NO</th>
                        <th>Tanggal</th>
                        <th>Kode</th>
                        <th>Nomor Surat</th>
                        <th>Jenis</th>
                        <th>Judul</th>
                        <th>Penerima</th>
                        <th>Link</th>
                        <th>Diinput Oleh</th>                      
                        <th>Ubah</th>
                        <th>Hapus</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                  </table>
                </div>
              </div>          
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
      <?php $this->load->view("_partials/numpang.php") ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php $this->load->view("_partials/footer.php") ?>
  <?php $this->load->view("_partials/loader.php") ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- hapus modal -->
<div id="hapusModal" class="modal fade">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header flex-column">
        <div class="icon-box">
          <i class="material-icons">&#xE5CD;</i>
        </div>
        <h4 class="modal-title w-100">Apakah anda yakin?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <p>Apakah anda ingin menghapus data ini? Data ini tidak bisa dipulihkan kembali.</p>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="deleteButton">Hapus</button>
      </div>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="<?php echo base_url('asset/js/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('asset/js/bootstrap/bootstrap.bundle.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('asset/dist/js/adminlte.min.js') ?>"></script>
<!-- datatables -->
<script src="<?php echo base_url('asset/plugin/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('asset/plugin/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('asset/plugin/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?php echo base_url('asset/plugin/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<!-- Moment -->
<script src="<?php echo base_url('asset/plugin/moment/moment-with-locales.min.js') ?>"></script>
<script src="//cdn.datatables.net/plug-ins/1.10.21/sorting/datetime-moment.js"></script>
<script>const base_url = "<?php echo base_url(); ?>"; const mulai = "<?php echo $mulai; ?>";</script>
<script type="text/javascript">
  let dt_surat;  
  $(document).ready(function(){
    $("#sidebar_surat").addClass("active");    
    moment.locale('id');
    $.fn.dataTable.moment('LL');
    dt_surat = $("#dt_surat").DataTable({
      order : [[2, "desc"]],
      ajax : {
        url : base_url + "surat/getAll",
        type : "GET",
        dataSrc : "",
        dataType : "JSON",
      },
      columns : [
      {data : "id"},
      {data : null, sortable : false, render: function(data,type,row,meta){
        return meta.row + meta.settings._iDisplayStart + 1;
      }},      
      {data : "tanggal"},
      {data : "kode"},        
      {data : "no_surat"},        
      {data : "jenis"},        
      {data : "judul"},        
      {data : "nama_penerima"},        
      {data : null, sortable: false, render: function(data,type,row,meta){
        return "<a href='"+row['link']+"' target='_blank'>"+row['link']+"</a>";
      }},
      {data : "diinput"},      
      {data : null, sortable : false, render: function(data,type,row,meta){
        // return "<a href='#' class='btn btn-warning editButton'><i class='fas fa-edit'></i>Ubah</a>";
        return "<a href='<?php echo base_url('surat/ubah/') ?>"+row['id']+"' class='btn btn-warning'><i class='fas fa-edit'></i>Ubah</a>";
      }},
      {data : null, sortable : false, render: function(data,type,row,meta){
        return "<a href='#' class='btn btn-danger deleteButton'><i class='fas fa-trash'></i>Hapus</a>";
      }}
      ],
      columnDefs : [
      {
        targets : [0], //target kolom id
        visible : false, //jangan tampilkan kolom id
      },
      {
        responsivePriority: 1,
        targets: [4,6],
      },
      {
        targets : [4,7,8,10,11],
        orderable : false,
      },
      {
        targets: 2,
        data: 'tanggal',
        render : function(data,type,row,meta){
          var dateObj = new Date(data);
          var momentObj = moment(dateObj);
          return momentObj.format('LL');
        }
      }
      ],
      responsive : true,
      autoWidth: false,
    });    

    $("#dt_surat tbody").on('click', 'tr .deleteButton', function(e){
      e.preventDefault();      
      var currentRow = $(this).parents("tr");
      if(currentRow.hasClass('child'))
      {
        currentRow = currentRow.prev();
      }
      var data = $("#dt_surat").DataTable().row(currentRow).data();
      confirmDelete(data['id'],data['judul']);      
    });    

    const confirmDelete = (id,judul) =>
    {
      $("#hapusModal").modal('show');
      $("#hapusModal").find('.modal-body').html('<p>Apakah anda ingin menghapus surat '+judul+'? Data ini tidak bisa dipulihkan kembali.');
      // $("#hapusModal").find('#deleteButton').attr("onclick","hapusData("+id+")");      
      // $("#hapusModal").find('#deleteButton').on('click',hapusData(id));
      delBtn.id = id;
    }

    const hapusData = (event) =>
    {
      const id = event.currentTarget.id;      
      $.ajax({
        url: base_url+"surat/hapus/"+id,
        dataType: "TEXT",
        beforeSend: function()
        {
          $(".loader2").show();
        },
        success: function(respon)
        {
          if(respon=="1")
          {
            dt_surat.ajax.reload(null,false);
            $("#respon").html("<div class='alert alert-success' role='alert' id='responMsg'><strong>Selamat</strong> Data berhasil dihapus</div>")
            $("#responMsg").hide().fadeIn(200).delay(2000).fadeOut(1000, function(){$(this).remove();});
            getKode();
            getJenis();
          }
          else
          {
            $("#respon").html("<div class='alert alert-warning' role='alert' id='responMsg'><strong>Maaf</strong> Data gagal dihapus. Silahkan coba lagi.</div>")
            $("#responMsg").hide().fadeIn(200).delay(2000).fadeOut(1000, function(){$(this).remove();});
          }
        },
        complete: function()
        {
          $(".loader2").hide();
        }
      });
    }

    const delBtn = document.getElementById('deleteButton');
    delBtn.addEventListener('click', hapusData);

    const selectKode = document.getElementById('selectKode');
    const selectJenis = document.getElementById('selectJenis');    
    const tMulai = document.getElementById("tMulai");
    const tAkhir = document.getElementById("tAkhir");
    const bFilter = document.getElementById("bFilter");
    const bReset = document.getElementById("bReset");
    let kodes = [];
    const RENDER_KODE = "renderKode";
    let jeniss = [];
    const RENDER_JENIS = "renderJenis";

    const getKode = () =>
    {
      $.ajax({
        url: base_url+"surat/getKode",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          if(data.length > 0)
          {
            kodes = [];
            for(const kode of data)
            {
              kodes.push(kode);
            }
          }
          document.dispatchEvent(new Event(RENDER_KODE));
        }
      });
    }

    document.addEventListener(RENDER_KODE,function(){
      selectKode.innerHTML = "";
      const opt = document.createElement('option');
      opt.innerText = "Pilih Kode Surat";
      opt.setAttribute('value','false');
      selectKode.append(opt);
      for(const kodeItem of kodes)
      {
        const opt = document.createElement('option');
        opt.setAttribute('value',kodeItem.kode);
        opt.innerText = kodeItem.kode;
        selectKode.append(opt);
      }
    });

    getKode();

    const getJenis = () => 
    {
      $.ajax({
        url: base_url+'surat/getJenis',
        type: 'GET',
        dataType: 'JSON',
        success: function(data)
        {          
          if(data.length > 0)
          {
            jeniss = [];
            for(const jenis of data)
            {
              jeniss.push(jenis);
            }
          }
          document.dispatchEvent(new Event(RENDER_JENIS));
        }
      });
    }

    document.addEventListener(RENDER_JENIS, function(){      
      selectJenis.innerHTML = "";
      const opt = document.createElement('option');
      opt.innerText = "Pilih Jenis Surat";
      opt.setAttribute('value','false');
      selectJenis.append(opt);
      for(const jenisItem of jeniss)
      {
        const opt = document.createElement('option');
        opt.setAttribute('value',jenisItem.jenis);
        opt.innerText = jenisItem.jenis;
        selectJenis.append(opt);
      }
    });

    getJenis();    

    bFilter.addEventListener('click', (event) => {
      const x = new Date(tMulai.value);
      const y = new Date(tAkhir.value);
      if(x>y)
      {
        $("#respon").html("<div class='alert alert-success' role='alert' id='responMsg'>Tanggal awal tidak boleh lebih dari tanggal akhir.</div>")
        $("#responMsg").hide().fadeIn(200).delay(2000).fadeOut(1000, function(){$(this).remove();});
      }
      else
      {        
        let filterKode = selectKode.value;
        let filterSurat = selectJenis.value;
        let data = {
          kode: filterKode,
          surat: filterSurat,
          mulai: tMulai.value,
          akhir: tAkhir.value
        }
        let out = [];
        for(let key in data)
        {          
          out.push(encodeURIComponent(data[key]));
        }
        let param = out.join('/');
        // console.log(base_url+'surat/filter/'+param);
        dt_surat.ajax.url(base_url+'surat/filter/'+param).load();
      }
    });

    bReset.addEventListener('click', (event) => {      
      selectKode.value = 'false';
      selectJenis.value = 'false';
      tMulai.value = mulai;
      tAkhir.valueAsDate = new Date();
      dt_surat.ajax.url(base_url+'surat/getAll').load();
    });
        
    <?php
      if($this->session->userdata('success')) :
        $respon = $this->session->userdata('success');
    ?>
      $("#respon").html("<div class='alert alert-success' role='alert' id='responMsg'><?php echo $respon; ?></div>")
      $("#responMsg").hide().fadeIn(200).delay(2000).fadeOut(1000, function(){$(this).remove();});
    <?php endif; ?>
  });
</script>
</body>
</html>
