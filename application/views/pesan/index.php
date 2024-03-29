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
            <h1>Pesan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item active">Pesan</li>
            </ol>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-sm-2">
            <a href="pesan/kirim" class="btn btn-block bg-gradient-primary">
              <i class="fas fa-paper-plane"></i> Kirim
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
                      <label for="status" class="form-check-label mr-2">Status Pesan</label>
                      <select name="selectStatus" id="selectStatus" class="form-inline"></select>
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
                  <table id="dt_pesan" class="table table-bordered table-hover">
                    <thead>
                      <tr>                        
                        <th>NO</th>
                        <th>Jenis</th>
                        <th>Judul</th>
                        <th>Penerima</th>
                        <th>Nomor WA</th>
                        <th>Status</th>                        
                        <th>Diperbarui</th>                        
                      </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                  </table>
                </div>
              </div>
            <!-- </div> -->
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
<script>const base_url = "<?php echo base_url(); ?>";const mulai = "<?php echo $mulai; ?>";</script>
<script type="text/javascript">
  let dt_pesan;
  const kirimUlang = (id) =>
  {
    $.ajax({
      url: base_url+"pesan/kirimUlang",
      data: {id:id},
      type: 'POST',
      dataType: 'JSON',
      beforeSend: function()
      {
        $('.loader2').show();
      },
      success: function(data)
      {
        console.log(data);
        if(data > 0)
        {                    
          dt_pesan.ajax.reload(null,false);
          $("#respon").html("<div class='alert alert-success' role='alert' id='responMsg'>Data berhasil diubah</div>")
          $("#responMsg").hide().fadeIn(200).delay(2000).fadeOut(1000, function(){$(this).remove();});
        }
        else
        {          
          $("#respon").html("<div class='alert alert-success' role='alert' id='responMsg'>Data gagal diubah</div>")
          $("#responMsg").hide().fadeIn(200).delay(2000).fadeOut(1000, function(){$(this).remove();});
          alert('Gagal ubah status pesan');
        }
      },
      error: function(err)
      {
        alert('Gagal ubah status pesan, mohon periksa jaringan anda');
      },
      complete: function()
      {
        $('.loader2').hide();
      }
    });
  }
  $(document).ready(function(){
    $("#sidebar_pesan").addClass("active");    
    moment.locale('id');
    $.fn.dataTable.moment('LL');
    dt_pesan = $("#dt_pesan").DataTable({
      // order : [[2, "desc"]],
      ajax : {
        url : base_url + "pesan/getAll",
        type : "GET",
        dataSrc : "",
        dataType : "JSON",
      },
      columns : [      
      {data : null, sortable : true, render: function(data,type,row,meta){
        // return meta.row + meta.settings._iDisplayStart + 1;
        return meta.row + 1;
      }},      
      {data : "jenis"},
      {data : "judul"},        
      {data : "nama"},        
      {data : "no_hp"},        
      {data : "status", render: function(data,type,row,meta){
        if(data=="gagal")
        {
          let a = document.createElement('a');          
          a.style = "color: #007bff; background-color: transparent; cursor: pointer;"
          a.setAttribute("onclick","kirimUlang("+row['id']+");");
          let i = document.createElement('i');
          i.className = "fas fa-paper-plane";
          a.append(i," Kirim Ulang");
          return a.outerHTML;
        }
        else
        {
          return data;
        }
      }},
      {data : "updated_at"},              
      ],
      columnDefs : [      
      {
        responsivePriority: 1,
        targets: [2,3],
      },
      {
        targets : [0,2,3,4],
        orderable : false,
      },
      {
        targets: 6,
        data: "updated_at",
        render: function(data,type,row,meta)
        {
            var dateObj = new Date(data);
            var momentObj = moment(dateObj);
            return momentObj.format('lll');
        }
      },
      {
        targets: [0],
        searchable: false,
      }
      ],
      responsive : true,
      autoWidth: false,
    });    

    const selectStatus = document.getElementById("selectStatus");
    const selectJenis = document.getElementById("selectJenis");
    let statuss = [];
    let jeniss = [];
    const RENDER_STATUS = "renderStatus";
    const RENDER_JENIS = "renderJenis";    
    const tMulai = document.getElementById("tMulai");
    const tAkhir = document.getElementById("tAkhir");
    const bFilter = document.getElementById("bFilter");
    const bReset = document.getElementById("bReset");

    const getStatus = () =>
    {
      $.ajax({
        type: 'GET',
        url: base_url+'pesan/getStatus',
        dataType: 'JSON',
        beforeSend: function()
        {
          $(".loader2").show();
        },
        success: function(data)
        {
          if(data.length > 0)
          {
            statuss = [];
            for(const status of data)
            {
              statuss.push(status);
            }
          }
          document.dispatchEvent(new Event(RENDER_STATUS));
        },
        complete: function()
        {
          $(".loader2").hide();
        }
      });
    }

    document.addEventListener(RENDER_STATUS,function(){
      selectStatus.innerHTML = '';
      const opt = document.createElement('option');
      opt.innerText = "Pilih Status Pesan";
      opt.setAttribute('value','false');
      selectStatus.append(opt);
      for(const statusItem of statuss)
      {
        const opt = document.createElement('option');
        opt.setAttribute('value',statusItem.status);
        opt.innerText = statusItem.status;
        selectStatus.append(opt);
      }
    });

    getStatus();

    const getJenis = () =>
    {
      $.ajax({
        type: 'GET',
        url: base_url+'pesan/getJenis',
        dataType: 'JSON',
        beforeSend: function()
        {
          $(".loader2").show();
        },
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
        },
        complete: function()
        {
          $(".loader2").hide();
        }
      });
    }

    document.addEventListener(RENDER_JENIS, function(){
      selectJenis.innerHTML = '';
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
        let filterStatus = selectStatus.value;
        let filterSurat = selectJenis.value;
        let data = {
          status: filterStatus,
          surat: filterSurat,
          mulai: tMulai.value,
          akhir: tAkhir.value
        }
        let out = [];
        for(let key in data)
        {
          // if(data.hasOwnProperty(key))
          // {
          //   out.push(key + '=' + encodeURIComponent(data[key]));
          // }
          out.push(encodeURIComponent(data[key]));
        }
        let param = out.join('/');        
        dt_pesan.ajax.url(base_url+'pesan/filter/'+param).load();
      }
    });

    bReset.addEventListener('click', (event) => {
      selectStatus.value = 'false';
      selectJenis.value = 'false';
      tMulai.value = mulai;
      tAkhir.valueAsDate = new Date();
      dt_pesan.ajax.url(base_url+'pesan/getAll').load();
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
