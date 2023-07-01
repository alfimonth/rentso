<?php
error_reporting(0);
?>

<!doctype html>
<html lang="en" class="no-js">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="theme-color" content="#3e454c">

  <title>Feedback | Rentso. </title>

  <!-- Font awesome -->
  <?php include('includes/style.php') ?>
  <style>
    .errorWrap {
      padding: 10px;
      margin: 0 0 20px 0;
      background: #fff;
      border-left: 4px solid #dd3d36;
      -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
      box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
    }

    .succWrap {
      padding: 10px;
      margin: 0 0 20px 0;
      background: #fff;
      border-left: 4px solid #5cb85c;
      -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
      box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
    }
  </style>

</head>

<body>
  <?php include('includes/header.php'); ?>

  <div class="ts-main-content">
    <?php include('includes/leftbar.php'); ?>
    <div class="content-wrapper">
      <div class="container-fluid">

        <div class="row">
          <div class="col-md-12">

            <h2 class="page-title">Feedback</h2>

            <!-- Zero Configuration Table -->
            <div class="panel panel-default">
              <div class="panel-heading">semua feedback</div>
              <div class="panel-body" style="overflow-x: auto;">
                <?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?= htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?= htmlentities($msg); ?> </div><?php } ?>
                <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th class="text-center">Name</th>
                      <th class="text-center">Email</th>
                      <th class="text-center">Telp</th>
                      <th class="text-center">Status</th>
                      <!-- <th>Tgl. Posting</th> -->
                      <th class="text-center" style="width: 10px;">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    foreach ($feeds as $feed) : ?>
                      <tr>
                        <td><?= htmlentities($feed['nama_visit']); ?></td>
                        <td><?= htmlentities($feed['email_visit']); ?></td>
                        <td><?= htmlentities($feed['telp_visit']); ?></td>
                        <!-- <td><?= htmlentities($feed['pesan']); ?></td>
												<td><?= htmlentities($feed['tgl_posting']); ?></td> -->
                        <td><?= ($feed['status'] === '1') ? 'Sudah Dibaca' : 'Belum Dibaca' ?></td>
                        <td class="text-center">
                          <a href="#myModal" data-toggle="modal" data-load-code="<?= $feed['id_cu']; ?>" data-remote-target="#myModal .modal-body"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
                          <a data-load-id="<?= $feed['id_cu']; ?>" data-load-nama="<?= $feed['nama_visit']; ?>"><i class="fa fa-close"></i></a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                <!-- Large modal -->
                <div class="modal fade bs-example-modal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-body">
                        <p>One fine body…</p>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Large modal -->
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Loading Scripts -->
  <?php include('includes/script.php') ?>
  <script>
    var app = {
      code: '0'
    };
    $('[data-load-code]').on('click', function(e) {
      e.preventDefault();

      var $this = $(this);
      var code = $this.data('load-code');
      if (code) {
        $($this.data('remote-target')).load('<?= base_url('admin/feed/'); ?>' + code);
        app.code = code;

      }
    });

    $('[data-load-id]').on("click", function() {
      var $this = $(this);
      var id = $this.data('load-id');
      var nama = $this.data('load-nama');
      Swal.fire({
        icon: 'warning',
        title: 'Hapus pesan dari ' + nama + '?',
        showCancelButton: true,
      }).then((result) => {
        if (result.value === true) {
          document.location = '<?= base_url('/admin/feeddel/'); ?>' + id;
        }
      })
    })
  </script>
  <?= $this->session->flashdata('hapus'); ?>

</body>

</html>