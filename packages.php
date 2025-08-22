<section class="page-section bg-light" id="home" style="background: linear-gradient(135deg, #e3f0ff 0%, #f8fafc 100%); min-height:100vh;">
  <div class="container py-5">
    <!-- Section Title -->
    <h2 class="text-center fw-bold mb-2" style="letter-spacing:1px; color:#121f4d; text-shadow:0 2px 8px #dbeafe;">Tour Packages</h2>
    <div class="d-flex w-100 justify-content-center mb-5">
      <hr class="border-warning" style="border:3px solid; border-radius:2px;" width="12%">
    </div>

    <div class="row g-4">
      <?php
      $packages = $conn->query("SELECT * FROM `packages` ORDER BY rand()");
      while($row = $packages->fetch_assoc()):
        $cover='';
        if(is_dir(base_app.'uploads/package_'.$row['id'])){
          $img = scandir(base_app.'uploads/package_'.$row['id']);
          $k = array_search('.',$img); if($k !== false) unset($img[$k]);
          $k = array_search('..',$img); if($k !== false) unset($img[$k]);
          $cover = isset($img[2]) ? 'uploads/package_'.$row['id'].'/'.$img[2] : "";
        }
        $row['description'] = strip_tags(stripslashes(html_entity_decode($row['description'])));
        $review = $conn->query("SELECT * FROM `rate_review` where package_id='{$row['id']}'");
        $review_count =$review->num_rows;
        $rate = 0;
        while($r= $review->fetch_assoc()){ $rate += $r['rate']; }
        if($rate > 0 && $review_count > 0) $rate = number_format($rate/$review_count,0,"");
      ?>
        <!-- Package Card -->
        <div class="col-md-6 col-lg-4">
          <div class="card h-100 border-0 shadow-lg rounded-4 overflow-hidden package-card position-relative" style="transition:box-shadow 0.3s, transform 0.3s;">
            <img class="card-img-top" src="<?php echo validate_image($cover) ?>" alt="<?php echo $row['title'] ?>" height="220" style="object-fit:cover; border-top-left-radius:1.2rem; border-top-right-radius:1.2rem;">
            <div class="card-body p-4 d-flex flex-column">
              <h5 class="card-title fw-bold text-dark mb-2" style="font-size:1.3rem;"><?php echo $row['title'] ?></h5>
              
              <!-- Rating --> 
              <div class="d-flex align-items-center mb-3">
                <div class="stars stars-small" style="font-size:1.2rem; color:#ffc800;">
                  <?php for($i=5;$i>=1;$i--): ?>
                    <input disabled type="radio" class="star star-<?php echo $i ?>" <?php echo $rate==$i?"checked":"" ?>><label class="star star-<?php echo $i ?>" style="margin-right:2px;"></label>
                  <?php endfor; ?>
                </div>
                <span class="ms-2 text-muted small">(<?php echo $review_count ?> reviews)</span>
              </div>

              <!-- Description -->
              <p class="card-text text-muted truncate mb-4" style="min-height:60px;"><?php echo $row['description'] ?></p>
              
              <!-- Footer (Price + Button) -->
              <div class="d-flex justify-content-between align-items-center mt-auto">
                <span class="badge bg-gradient-primary fs-6 px-3 py-2 shadow-sm" style="background:linear-gradient(90deg,#60B5FF,#121f4d);color:#fff;font-weight:500;"><i class="fa fa-tag"></i> ₹<?php echo number_format($row['cost']) ?></span>
                <a href="./?page=view_package&id=<?php echo md5($row['id']) ?>" class="btn btn-warning btn-sm rounded-pill px-3 py-2 shadow-sm fw-semibold" style="letter-spacing:0.5px;">View Package <i class="fa fa-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>

<!-- Custom Styling -->
<style>
  .package-card {
    box-shadow: 0 4px 16px rgba(96,181,255,0.10), 0 1.5px 6px rgba(18,31,77,0.08);
    border: 1px solid #e3eafc;
    transition: box-shadow 0.3s, transform 0.3s;
  }
  .package-card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 8px 32px rgba(96,181,255,0.18), 0 2px 12px rgba(18,31,77,0.12) !important;
    border-color: #60B5FF;
  }
  .truncate {
    display: -webkit-box;
    -webkit-line-clamp: 3; /* show 3 lines max */
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
  .stars input.star {
    display: none;
  }
  .stars label.star {
    font-size: 1.2em;
    color: #ccc;
    cursor: default;
    transition: color 0.2s;
  }
  .stars input.star:checked ~ label.star,
  .stars label.star:hover {
    color: #ffc800;
  }
  .stars label.star:before {
    content: '\2605';
    font-family: inherit;
  }
  .btn-warning {
    background: linear-gradient(90deg,#ffc107 60%,#60B5FF 100%);
    border: none;
    color: #121f4d;
    font-weight: 600;
    box-shadow: 0 2px 8px rgba(96,181,255,0.08);
    transition: background 0.2s, color 0.2s;
  }
  .btn-warning:hover {
    background: linear-gradient(90deg,#60B5FF 0%,#ffc107 100%);
    color: #fff;
  }
  .bg-gradient-primary {
    background: linear-gradient(90deg,#60B5FF,#121f4d) !important;
    color: #fff !important;
  }
</style>
