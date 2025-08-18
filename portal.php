<style>
header.masthead {
    background: linear-gradient(rgba(255,255,255,0.6), rgba(255,255,255,0.7)),
                url('<?php echo validate_image($_settings->info('cover')) ?>') center/cover no-repeat !important;
    color: #121f4d; /* dark blue text */
    text-align: center;
    padding: 140px 0;
}

header.masthead .container {
    background: rgba(18, 31, 77, 0.85); /* dark blue transparent */
    color: #fff; /* text stays visible */
    padding: 40px;
    border-radius: 12px;
}

	.masthead-subheading {
		font-size: 1.5rem;
		font-weight: 300;
		margin-bottom: 15px;
	}
	.masthead-heading {
		font-size: 3rem;
		font-weight: bold;
		margin-bottom: 25px;
	}
	.masthead a.btn {
		padding: 15px 35px;
		font-size: 1.2rem;
		border-radius: 50px;
	}

	/* Section Titles */
	.page-section h2 {
		color: #ffc107;
		font-weight: 700;
		margin-bottom: 10px;
	}
	.page-section hr {
		margin-bottom: 30px;
	}

	/* Cards */
	.card {
		border: none;
		transition: all 0.3s ease-in-out;
		box-shadow: 0 6px 18px rgba(0,0,0,0.1);
	}
	.card:hover {
		transform: translateY(-8px);
		box-shadow: 0 12px 24px rgba(0,0,0,0.2);
	}
	.card-body h5 {
		font-weight: bold;
		color: #121f4d;
	}
	.card-text {
		color: #555;
		font-size: 0.95rem;
	}

	/* About Us */
	#about .card {
		background: #f9f9f9;
		border-radius: 10px;
	}

	/* Contact */
	#contact input, #contact textarea {
		border-radius: 8px;
		padding: 12px;
		border: 1px solid #ddd;
	}
	#contact button {
		border-radius: 30px;
		padding: 12px 40px;
		font-size: 1.1rem;
	}
	#contact h2 {
		color: #121f4d;
	}
	.shadow-custom {
  box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.08);
}
</style>

<!-- Masthead-->
<header class="masthead">
	<div class="container">
		<div class="masthead-subheading">Welcome To Global Trip Site</div>
		<div class="masthead-heading text-uppercase">Explore our Tour Packages</div>
		<a class="btn btn-warning btn-xl text-uppercase" href="#home">View Tours</a>
	</div>
</header>

<!-- Services / Tour Packages -->
<section class="page-section bg-light text-dark" id="home">
	<div class="container">
		<h2 class="text-center">Tour Packages</h2>
		<div class="d-flex w-100 justify-content-center">
			<hr class="border-warning" style="border:3px solid" width="15%">
		</div>
		<div class="row">
			<?php
			$packages = $conn->query("SELECT * FROM `packages` order by rand() limit 3");
				while($row = $packages->fetch_assoc() ):
					$cover='';
					if(is_dir(base_app.'uploads/package_'.$row['id'])){
						$img = scandir(base_app.'uploads/package_'.$row['id']);
						$k = array_search('.',$img);
						if($k !== false) unset($img[$k]);
						$k = array_search('..',$img);
						if($k !== false) unset($img[$k]);
						$cover = isset($img[2]) ? 'uploads/package_'.$row['id'].'/'.$img[2] : "";
					}
					$row['description'] = strip_tags(stripslashes(html_entity_decode($row['description'])));

					$review = $conn->query("SELECT * FROM `rate_review` where package_id='{$row['id']}'");
					$review_count =$review->num_rows;
					$rate = 0;
					while($r= $review->fetch_assoc()){
						$rate += $r['rate'];
					}
					if($rate > 0 && $review_count > 0)
					$rate = number_format($rate/$review_count,0,"");
			?>
				<div class="col-md-4 p-4">
					<div class="card w-100 rounded-3">
						<img class="card-img-top rounded-top" src="<?php echo validate_image($cover) ?>" alt="<?php echo $row['title'] ?>" height="220" style="object-fit:cover">
						<div class="card-body">
							<h5 class="card-title truncate-1"><?php echo $row['title'] ?></h5>
							<div class="stars stars-small mb-2">
								<?php for($i=5;$i>=1;$i--): ?>
									<input disabled class="star star-<?php echo $i ?>" id="star-<?php echo $i ?>" type="radio" <?php echo $rate == $i ? "checked" : '' ?>/> 
									<label class="star star-<?php echo $i ?>" for="star-<?php echo $i ?>"></label> 
								<?php endfor; ?>
							</div>
							<p class="card-text truncate"><?php echo $row['description'] ?></p>
							<div class="text-end">
								<a href="./?page=view_package&id=<?php echo md5($row['id']) ?>" class="btn btn-sm btn-warning">View Package <i class="fa fa-arrow-right"></i></a>
							</div>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
		<div class="text-end mt-3">
			<a href="./?page=packages" class="btn btn-warning">Explore All Packages <i class="fa fa-arrow-right"></i></a>
		</div>
	</div>
</section>

<!-- About -->
<section class="page-section" id="about" style="background: linear-gradient(135deg, #e3f0ff 0%, #f8fafc 100%); min-height:100vh;">
	<div class="container">
		<div class="text-center mb-4">
			<h2 class="section-heading text-uppercase">About Us</h2>
						<div class="d-flex w-100 justify-content-center">
			<hr class="border-warning" style="border:3px solid" width="17%"> 
		</div>
		<div class="card shadow-sm">
			<div class="card-body">
				<?php echo file_get_contents(base_app.'about.html') ?>
			</div>
		</div>
	</div>
</section>

<!-- Contact -->
<section class="page-section bg-light" id="contact">
	<div class="container">
		<div class="text-center">
			<div class="card shadow-custom"> 
			<h2 class="section-heading text-uppercase text-warning">Contact Us</h2>
			<div class="d-flex w-100 justify-content-center">
			<hr class="border-warning" style="border:3px solid" width="17%"> 	
	
		</div>
				<h3 class="section-subheading text-muted">Send us a message for inquiries.</h3>
		<form id="contactForm">
			<div class="row align-items-stretch mb-4">
				<div class="col-md-6">
					<div class="form-group mb-3">
						<input class="form-control" id="name" name="name" type="text" placeholder="Enter Your Name *" required  />
					</div>
					<div class="form-group mb-3">
						<input class="form-control" id="email" name="email" type="email" placeholder="Enter Your Email *" required />
					</div>
					<div class="form-group mb-3">
						<input class="form-control" id="subject" name="subject" type="text" placeholder="Enter Your Subject *" required />
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group mb-3">
						<textarea class="form-control" id="message" name="message" placeholder="Enter Your Message *" rows="8" required></textarea>
					</div>
				</div>
			</div>
			<div class="text-center">
				<button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit">Send Message</button>
			</div>
		</form>
	</div>
								</div>
</section>

<script>
$(function(){
	$('#contactForm').submit(function(e){
		e.preventDefault()
		$.ajax({
			url:_base_url_+"classes/Master.php?f=save_inquiry",
			method:"POST",
			data:$(this).serialize(),
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occurred",'error')
				end_loader()
			},
			success:function(resp){
				if(typeof resp == 'object' && resp.status == 'success'){
					alert_toast("Inquiry sent",'success')
					$('#contactForm').get(0).reset()
				}else{
					console.log(resp)
					alert_toast("An error occurred",'error')
					end_loader()
				}
			}
		})
	})
})
</script>
