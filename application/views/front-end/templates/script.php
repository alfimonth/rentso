<script src="<?= base_url('assets/'); ?>js/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/interface.js"></script>
<script src="<?= base_url('assets/'); ?>switcher/js/mark.js"></script>
<script src="<?= base_url('assets/'); ?>js/bootstrap-slider.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/slick.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/owl.carousel.min.js"></script>
<script src="<?= base_url('assets/'); ?>swal/sweetalert2.all.min1.js"></script>
<script>
    $('#logout').on("click", function() {
        Swal.fire({
            icon: 'warning',
            title: 'Apakah anda yakin untuk logout?',
            showCancelButton: true,
        }).then((result) => {
            if (result.value === true) {
                document.location = '<?= base_url('/auth/logout'); ?>';
            }
        })
    })
</script>