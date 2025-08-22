<!-- Navigation-->
<style>
:root {
  --nav-bg: #121f4d;
  --nav-bg-shrink: #0d153a;
  --nav-brand: #ffc107;
  --nav-link: #ffffff;
  --nav-link-hover: #60B5FF;
  --nav-link-active: #ffc107;
  --nav-shadow: 0 10px 20px rgba(0,0,0,0.15);
  --nav-title-size: 1.5rem;
  --nav-title-weight: 500;
  --nav-title-color: #fff;
  --nav-title-highlight: #60B5FF;
}

.title {
  font-size: var(--nav-title-size);
  font-weight: var(--nav-title-weight);
  color: var(--nav-title-color);

  margin-bottom: 0;
  display: flex;
  align-items: center;

}

.title .highlight {
  color: var(--nav-title-highlight);
  font-weight: 800;

}

.navbar {
  box-shadow: var(--nav-shadow);
  padding-block: 0.5rem;
  padding-inline: 1.5rem;
  font-size: 40px;
}

.navbar-brand {
  color: var(--nav-brand) !important;
  font-size: 1.25rem;
  display: flex;
  align-items: center;
  gap: 0.5em;
}

.navbar-toggler {
  border: none;
  background: transparent;
  color: var(--nav-link);
  font-size: 1.2rem;
  padding: 0.5em 1em;
  transition: background 0.2s;
}
.navbar-toggler:focus {
  outline: 2px solid var(--nav-link-hover);
  background: rgba(96,181,255,0.1);
}

#mainNav {
  background-color: var(--nav-bg) !important;
  transition: background 0.3s, box-shadow 0.3s;
}

#mainNav.navbar-shrink {
  background-color: var(--nav-bg-shrink) !important;
  box-shadow: var(--nav-shadow);
}

#mainNav .navbar-nav {
  gap: 0.5em;
  display: flex;
  align-items: center;
}

#mainNav .nav-link {
  color: var(--nav-link) !important;
  font-weight: 500;
  letter-spacing: 1px;
  padding: 0.5em 1em;
  border-radius: 0.5em;
  transition: color 0.2s, background 0.2s;
  position: relative;
}

#mainNav .nav-link:hover,
#mainNav .nav-link:focus {
  color: var(--nav-link-hover) !important;
  background: rgba(96,181,255,0.08);
  text-decoration: none;
}

#mainNav .nav-link.active,
#mainNav .nav-link[aria-current="page"] {
  color: var(--nav-link-active) !important;
  background: rgba(255,193,7,0.08);
}

#mainNav .nav-link i {
  margin-right: 0.3em;
}

@media (max-width: 991px) {
  .navbar-nav {
    flex-direction: column;
    gap: 0.25em;
    font-size: 20px;
    align-items: flex-start;
  }
  .navbar-brand {
    font-size: 1.1rem;
  }
  .title {
    font-size: 1.3rem;
  }
}

</style>
<nav class="navbar navbar-expand-lg fixed-top navbar-dark" id="mainNav">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="<?php echo $page !='home' ? './':''  ?>">
      <h1 class="title">
        Global<span class="highlight">Trip</span>
      </h1>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span>Menu</span> <i class="fas fa-bars ms-1"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ms-auto py-4 py-lg-0">
        <li class="nav-item"><a class="nav-link" href="<?php echo $page !='home' ? './':''  ?>">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="./?page=packages">Packages</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo $page !='home' ? './':''  ?>#about">About</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo $page !='home' ? './':''  ?>#contact">Contact</a></li>
        <?php if(isset($_SESSION['userdata'])): ?>
          <li class="nav-item"><a class="nav-link" href="./?page=my_account"><i class="fa fa-user"></i> Hi, <?php echo $_settings->userdata('firstname') ?>!</a></li>
          <li class="nav-item"><a class="nav-link" href="logout.php"><i class="fa fa-sign-out-alt"></i></a></li>
        <?php else: ?>
          <li class="nav-item"><a class="nav-link" href="javascript:void(0)" id="login_btn">Login</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<script>
  $(function(){
    $('#login_btn').click(function(){
      uni_modal("","login.php","large")
    })
    $('#navbarResponsive').on('show.bs.collapse', function () {
        $('#mainNav').addClass('navbar-shrink')
    })
    $('#navbarResponsive').on('hidden.bs.collapse', function () {
        if($(window).scrollTop() === 0)
          $('#mainNav').removeClass('navbar-shrink')
    })
  })
</script>
