<?php 
include('includes/db.php'); 
include('includes/header.php'); 
?>

<style>
    /* Hero Section */
    .hero-banner {
        background: linear-gradient(135deg, #6c5ce7 0%, #a29bfe 100%);
        color: white;
        padding: 50px 0;
        text-align: center;
        border-radius: 0 0 40px 40px;
        margin-bottom: 30px;
    }

    /* Modern Card Effects - Alag dikhne ke liye */
    .content-item-card {
        background: #fff;
        border-radius: 18px;
        border: 1px solid #e0e0e0;
        margin-bottom: 25px;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); /* Smooth pop-out effect */
        position: relative;
    }
    
    /* Card Hover Effect */
    .content-item-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 30px rgba(108, 92, 231, 0.15);
        border-color: #6c5ce7;
    }

    /* Notice Board - Restricted Area */
    .notice-board-container {
        background: #fff;
        border-radius: 20px;
        border: 2px solid #6c5ce7;
        overflow: hidden; /* Bahar nahi dikhega */
        position: sticky;
        top: 100px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.05);
    }

    .notice-header {
        background: #6c5ce7;
        color: white;
        padding: 15px;
        font-weight: 700;
        text-align: center;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .notice-scroll-area {
        height: 400px;
        padding: 0 15px;
        overflow: hidden; /* Strict Boundary */
        position: relative;
    }

    .notice-item {
        padding: 15px;
        border-bottom: 1px solid #f1f1f1;
        background: #fff;
        transition: 0.3s;
    }
    
    .notice-item:hover {
        background: #f8f7ff;
    }

    /* Photo Split View */
    .photo-split {
        display: flex;
        min-height: 220px;
    }
    .photo-part {
        width: 40%;
        background-size: cover;
        background-position: center;
        border-right: 3px solid #6c5ce7;
    }
    .details-part {
        width: 60%;
        padding: 20px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    @media (max-width: 768px) {
        .photo-split { flex-direction: column; }
        .photo-part { width: 100%; height: 180px; border-right: none; border-bottom: 3px solid #6c5ce7; }
        .details-part { width: 100%; }
    }
</style>

<div class="hero-banner">
    <div class="container">
        
        <h2 class="fw-bold">WPFixHub Digital Portal</h2>
        <p class="small text-white-50">High-Quality Resources & Updates</p>
        <p class="small text-white-50">by Rahul Kumar.</p>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold m-0 text-dark">Resources Library</h4>
                <div class="dropdown">
                    <button class="btn btn-sm btn-outline-primary dropdown-toggle rounded-pill" type="button" data-bs-toggle="dropdown">
                        Filter Category
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="index.php">All</a></li>
                        <li><a class="dropdown-item" href="category.php?type=pdf">PDFs</a></li>
                        <li><a class="dropdown-item" href="category.php?type=photo">Photos</a></li>
                    </ul>
                </div>
            </div>

            <?php
            $query = "SELECT * FROM uploads ORDER BY id DESC";
            $result = mysqli_query($conn, $query);

            while($row = mysqli_fetch_assoc($result)) {
                $file_link = str_replace('../', '', $row['file_name']);
                
                if($row['file_type'] == 'photo') { ?>
                    <div class="content-item-card">
                        <div class="photo-split">
                            <div class="photo-part" style="background-image: url('<?php echo $file_link; ?>');"></div>
                            <div class="details-part">
                                <span class="badge bg-primary mb-2" style="width: fit-content;">Gallery</span>
                                <h5 class="fw-bold mb-1 text-dark text-break"><?php echo $row['title']; ?></h5>
                                <p class="text-muted small mb-3">Posted in: <?php echo $row['category']; ?></p>
                                <a href="<?php echo $file_link; ?>" target="_blank" class="btn btn-sm btn-dark px-4 rounded-pill">View Full Photo</a>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="content-item-card p-3">
                        <div class="d-flex align-items-center">
                            <div class="icon-box me-3">
                                <i class="bi bi-file-earmark-pdf-fill text-danger display-5"></i>
                            </div>
                            <div class="w-100">
                                <h5 class="fw-bold mb-1 text-dark text-break"><?php echo $row['title']; ?></h5>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted"><?php echo $row['category']; ?> • PDF</small>
                                    <a href="view-pdf.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm rounded-pill px-4">Open</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
            } ?>
        </div>

        <div class="col-lg-4">
            <div class="notice-board-container">
                <div class="notice-header">
                    <i class="bi bi-broadcast me-2"></i> Notice Board
                </div>
                <div class="notice-scroll-area">
                    <marquee direction="up" scrollamount="2" onmouseover="this.stop();" onmouseout="this.start();" height="100%">
                        <?php
                        $notices = mysqli_query($conn, "SELECT * FROM notices ORDER BY id DESC");
                        while($n = mysqli_fetch_assoc($notices)) {
                            echo "<div class='notice-item'>
                                    <div class='fw-bold text-primary small'>New Update</div>
                                    <div class='text-dark mt-1'>{$n['notice_text']}</div>
                                    <div class='text-muted mt-2' style='font-size: 10px;'><i class='bi bi-clock'></i> ".date('d M Y', strtotime($n['created_at']))."</div>
                                  </div>";
                        }
                        ?>
                    </marquee>
                </div>
                <div class="bg-light p-2 text-center">
                    <small class="text-muted">Scroll down to see more</small>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>