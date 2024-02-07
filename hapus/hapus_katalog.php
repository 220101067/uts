<?php

$id = $_GET['id'];

// Delete
$delete = $con->prepare("DELETE FROM katalog_buku WHERE id_katalog = ?");
$delete->bindParam(1, $id); 
$delete->execute();

// Redirect setelah menghapus
echo "<script>
        alert('Data Berhasil dihapus');
        window.location.href = 'index.php?halaman=katalog_buku';
</script>";
?>
