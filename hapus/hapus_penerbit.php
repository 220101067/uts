<?php

$id = $_GET['id'];

// Delete
$delete = $con->prepare("DELETE FROM penerbit_buku WHERE id_penerbit = ?");
$delete->bindParam(1, $id); 
$delete->execute();

// Redirect setelah menghapus
echo "<script>
        alert('Data Berhasil dihapus');
        window.location.href = 'index.php?halaman=penerbit_buku';
</script>";
?>
