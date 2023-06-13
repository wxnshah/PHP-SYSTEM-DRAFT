@if (Session::has('failed-status'))
<script>
    setTimeout(function() {
        Swal.fire({
            position: 'center', showConfirmButton: false, titleText: 'Log Masuk Gagal !', text: 'Akaun Anda Belum Aktif ! Sila Hubungi Bahagian Teknologi Maklumat Untuk Aktifkan Akaun !', icon: 'error', timerProgressBar: true, timer: 3000
        })
    }, 600);
</script>
@endif

@if (Session::has('failed-login'))
<script>
    setTimeout(function() {
        Swal.fire({
            position: 'center', showConfirmButton: false, titleText: 'Log Masuk Gagal !', text: 'No Kad Pengenalan atau Kata Laluan Salah !', icon: 'error', timerProgressBar: true, timer: 3000
        })
    }, 600);
</script>
@endif

@if (Session::has('success-insert'))
<script>
    setTimeout(function() {
        Swal.fire({
            position: 'top-end', showConfirmButton: false, titleText: 'Pendaftaran Berjaya !', text: 'Maklumat anda telah berjaya didaftar !', icon: 'success', timerProgressBar: true, timer: 3000
        })
    }, 600);
</script>
@endif

@if (Session::has('success-update'))
<script>
    setTimeout(function() {
        Swal.fire({
            position: 'top-end', showConfirmButton: false, titleText: 'Kemaskini Berjaya !', text: 'Data anda telah berjaya dikemaskini !', icon: 'success', timerProgressBar: true, timer: 3000
        })
    }, 600);
</script>
@endif

@if (Session::has('success-delete'))
<script>
    setTimeout(function() {
        Swal.fire({
            position: 'top-end', showConfirmButton: false, titleText: 'Padam Berjaya !', text: 'Data anda telah berjaya dipadam !', icon: 'success', timerProgressBar: true, timer: 3000
        })
    }, 600);
</script>
@endif
