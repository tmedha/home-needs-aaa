<div class="card" style="width: 18rem;">
    <img src="logo.png" class="card-img-top" alt="Company Logo">
    <div class="card-header">
        <span class="badge text-bg-customLA"><?php echo $row["availability"]; ?></span>
        <span class="badge text-bg-customS"><?php echo $row["service_type"]; ?></span>
    </div>
    <div class="card-body">
        <h5 class="card-title"><?php echo $row["service_name"]; ?></h5>
        <p class="card-text">Rate: <?php echo $row["rate"]; ?></p>
    </div>
    <div class="card-body">
        <a href="services.html" class="btn btn-custom">More Info</a>
    </div>
</div>
