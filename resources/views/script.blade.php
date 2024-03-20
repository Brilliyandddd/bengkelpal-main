<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '#btn-edit-project', function() {
            var id = $(this).data('id');
            var namaproject = $(this).data('nama_project');
            var startproject = $(this).data('start_project');
            var finishproject = $(this).data('finish_project');
            var keteranganproject = $(this).data('keterangan_project');

            $('#modal-edit-projectmenu').modal('show');
            $('#id').val(id);
            $('#nama_project-edit').val(namaproject);
            $('#start_project-edit').val(startproject);
            $('#finish_project-edit').val(finishproject);
            $('#keterangan_project-edit').val(keteranganproject);
            $('#formEdit').attr("action", "/projectmenu/" + id);
        });
        $(document).on('click', '#btn-edit-menulanjutan', function() {
            var id = $(this).data('id');
            var nip = $(this).data('nip');
            var nama = $(this).data('nama');
            var jabatan = $(this).data('jabatan');

            $('#modal-edit-menulanjutan').modal('show');
            $('#id').val(id);
            $('#nip').val(nip);
            $('#nama').val(nama);
            $('#jabatan').val(jabatan);
            $('#formEdit').attr("action", "/menulanjutan/" + id);
        });
        $(document).on('click', '#btn-edit-tools', function() {
            var id = $(this).data('id');
            var nama_tools = $(this).data('nama_tools');
            var jumlah_tools = $(this).data('jumlah_tools');
            var status_tools = $(this).data('status_tools');
            var kalibrasi_date = $(this).data('kalibrasi_date');

            $('#modal-edit-tools').modal('show');
            $('#id').val(id);
            $('#nama_tools-edit').val(nama_tools);
            $('#jumlah_tools-edit').val(jumlah_tools);
            $('#status_tools-edit').val(status_tools);
            $('#kalibrasi_date-edit').val(kalibrasi_date);
            $('#formEdit').attr("action", "/tools/" + id);
        });
        $(document).on('click', '#btn-edit-aktivitas', function() {
            var id = $(this).data('id');
            var id_project = $(this).data('id_project');
            var nama_aktivitas = $(this).data('nama_aktivitas');
            var start_aktivitas = $(this).data('start_aktivitas');
            var finish_aktivitas = $(this).data('finish_aktivitas');
            var status_aktivitas = $(this).data('status_aktivitas');
            var keterangan_aktivitas = $(this).data('keterangan_aktivitas');

            $('#modal-edit-aktivitas').modal('show');
            $('#id').val(id);
            $('#id_project-edit').val(id_project).change();
            $('#nama_aktivitas-edit').val(nama_aktivitas);
            $('#start_aktivitas-edit').val(start_aktivitas);
            $('#finish_aktivitas-edit').val(finish_aktivitas);
            $('#status_aktivitas-edit').val(status_aktivitas).change();
            $('#keterangan_aktivitas-edit').val(keterangan_aktivitas);
            $('#formEdit').attr("action", "/aktivitas/" + id);
        });
        $(document).on('click', '#btn-edit-revisigambar', function() {
            var id = $(this).data('id');
            var id_project = $(this).data('id_project');
            var judul_revisi = $(this).data('judul_revisi');
            var status_revisi = $(this).data('status_revisi');
            var keterangan_revisi = $(this).data('keterangan_revisi');

            $('#modal-edit-revisi').modal('show');
            $('#id').val(id);
            $('#id_project-edit').val(id_project).change();
            $('#judul_revisi-edit').val(judul_revisi);
            $('#status_revisi-edit').val(status_revisi).change();
            $('#keterangan_revisi-edit').val(keterangan_revisi);

            $('#formEdit').attr("action", "/revisigambar/" + id);
        });
        $(document).on('click', '#btn-edit-notifikasi', function() {
            var id = $(this).data('id');
            var status = $(this).data('status');
            var keterangan = $(this).data('keterangan');

            $('#modal-edit-notifikasi').modal('show');
            $('#id').val(id);
            $('#status_notifikasi-edit').val(status).change();
            $('#keterangan_notifikasi-edit').val(keterangan);

            $('#formEdit').attr("action", "/notifikasi/" + id);
        });
    });
</script>
