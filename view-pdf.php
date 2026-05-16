<?php 
include('includes/db.php'); 
include('includes/header.php'); 

// URL से File ID प्राप्त करना
if(isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "SELECT * FROM uploads WHERE id = '$id' AND file_type = 'pdf'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);

    if(!$data) {
        echo "<div class='container mt-5'><div class='alert alert-danger'>File not found!</div></div>";
        include('includes/footer.php');
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12 mb-3 d-flex justify-content-between align-items-center">
            <h4 class="text-primary fw-bold">
                <i class="bi bi-file-earmark-pdf-fill"></i> <?php echo $data['title']; ?>
            </h4>
            <a href="<?php echo str_replace('../', '', $data['file_name']); ?>" download class="btn btn-success">
                <i class="bi bi-download"></i> Download PDF
            </a>
        </div>

        <div class="col-md-12">
            <div class="card shadow-lg" style="border-radius: 15px; overflow: hidden;">
                <div class="card-body p-0">
                    <embed 
                        src="<?php echo str_replace('../', '', $data['file_name']); ?>#toolbar=0" 
                        type="application/pdf" 
                        width="100%" 
                        height="800px" 
                    />
                </div>
            </div>
            <p class="text-center mt-3 text-muted small">
                If the PDF is not displaying, <a href="<?php echo str_replace('../', '', $data['file_name']); ?>" target="_blank">click here to open in new tab</a>.
            </p>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>