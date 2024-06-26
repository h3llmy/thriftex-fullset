<div class="row me-0 ms-0 mb-0 justify-content-md-center">
    <div class="col col-lg-4 ms-0 me-0 ps-0 pe-0">
        <div class="card mb-2 pb-4 min-h-1vh">
            <div class="content mb-2 store_profile">
                <div class="store_profile_thumbnail home-banner">
                    <?php
                    foreach ($page_data['barcode_foto'] as $key => $value) { ?>
                    <img src="<?= $value['file_url'] ?>" alt="">
                    <?php } ?>
                </div>
                <div class="store_profile_link-list">
                    <ul>
                        <li><a href="<?= $page_full_url.'/detail' ?>">Product Detail</a></li>
                        <li><a href="<?= $page_full_url.'/certificate' ?>">Certificate Product</a></li>
                        <li><a href="<?= $page_full_url.'/lookbook' ?>">Look Book</a></li>
                        <li><a href="#">Review Product</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
