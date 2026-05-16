<?php 
include('includes/db.php'); 
include('includes/header.php'); 

// URL से Type (pdf, book, photo) प्राप्त करना
if(isset($_GET['type'])) {
    $type = mysqli_real_escape_string($conn, $_GET['type']);
    $title_display = strtoupper($type) . " Library";
} else {
    header("Location: index.php");
    exit;
}
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 mb-4">
            <h2 class="fw-bold border-bottom pb-3">
                <i class="bi bi-collection-fill text-primary"></i> <?php echo $title_display; ?>
            </h2>
        </div>

        <?php
        // Database से Filtered Data लाना
        $query = "SELECT * FROM uploads WHERE file_type = '$type' ORDER BY id DESC";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $file_link = str_replace('../', '', $row['file_name']);
                ?>
                
                <div class="col-md-4 mb-4">
                    <div class="card content-card h-100 shadow-sm border-0">
                        <?php if($type == 'photo'): ?>
                            <img src="<?php echo $file_link; ?>" class="card-img-top gallery-img" alt="Photo">
                        <?php else: ?>
                            <div class="card-body text-center py-4">
                                <i class="bi <?php echo ($type == 'pdf') ? 'bi-file-pdf text-danger' : 'bi-book text-info'; ?> display-3"></i>
                            </div>
                        <?php endif; ?>

                        <div class="card-body">
                            <h5 class="card-title fw-semibold text-dark"><?php echo $row['title']; ?></h5>
                            <p class="text-muted small">Category: <?php echo $row['category']; ?></p>
                            
                            <div class="d-grid mt-3">
                                <?php if($type == 'pdf'): ?>
                                    <a href="view-pdf.php?id=<?php echo $row['id']; ?>" class="btn btn-primary rounded-pill">
                                        <i class="bi bi-eye"></i> View PDF
                                    </a>
                                <?php elseif($type == 'photo'): ?>
                                    <a href="<?php echo $file_link; ?>" target="_blank" class="btn btn-success rounded-pill">
                                        <i class="bi bi-fullscreen"></i> Full View
                                    </a>
                                <?php else: ?>
                                    <a href="<?php echo $file_link; ?>" download class="btn btn-info text-white rounded-pill">
                                        <i class="bi bi-download"></i> Download Book
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
            }
        } else {
            echo "
            <div class='col-md-12 text-center py-5'>
                <i class='bi bi-folder-x display-1 text-muted'></i>
                <p class='mt-3 lead text-muted'>No items found in this category.</p>
                <a href='index.php' class='btn btn-outline-primary'>Go Back Home</a>
            </div>";
        }
        ?>
    </div>
</div>

<?php include('includes/footer.php'); ?>