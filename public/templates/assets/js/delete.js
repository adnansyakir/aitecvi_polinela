function confirmDelete(id, url) {
    Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Setelah dihapus, data Anda akan benar-benar hilang!",
        icon: "warning",
        showCancelButton: true,
        buttons: true,
        dangerMode: true,
    })
    .then((result) => {
        if (result.isConfirmed) { // Cek apakah pengguna mengklik "OK"
            window.location.href = url + id;
        } else {
            Swal.fire("Batal menghapus data!"); // Tampilkan pesan bahwa pengguna membatalkan operasi
        }
    });
}
