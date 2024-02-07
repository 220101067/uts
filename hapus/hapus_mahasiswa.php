<?php

$id = $_GET['id'];

// Delete
$delete = $con->prepare("DELETE FROM mahasiswa WHERE id_mahasiswa = ?");
$delete->bindParam(1, $id); 
$delete->execute();

// Redirect setelah menghapus
echo "<script>
        alert('Data Berhasil dihapus');
        window.location.href = 'index.php?halaman=mahasiswa';
</script>";
?>
