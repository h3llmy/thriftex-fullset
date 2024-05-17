<?php require_once('inc/header.php') ?>
    <div class="container-xxl bd-gutter mt-3 my-md-4 bd-layout main-containers">
        <div class="row">
            <div class="col-md-3">
                <?php require_once('inc/sidebar.php') ?>
            </div>
            <div class="col-md-9">
                <div class="card border-0">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between mb-4">
                            <a href="<?= base_url('barcode/new') ?>" class="btn btn-dark">Tambah Produk</a>
                        </div>
                        <div>Riwayat Barcode :</div>
                        <div class="table-responsive_">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="p-4">N0</th>
                                        <th class="p-4">Tgl Buat</th>
                                        <th class="p-4">Brand</th>
                                        <th class="p-4">Jenis</th>
                                        <th class="p-4">Ukuran</th>
                                        <th class="p-4">Status</th>
                                        <th class="p-4"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data_barcode as $key => $value) {
                                        $status = '';
                                        if($value->payment_status == 'pending'){
                                            $status = '<span class="badge bg-warning"><svg width="15px" height="15px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M12 6V12" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M16.24 16.24L12 12" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg> Pending Payment</span>';
                                        }else if($value->payment_status == 'paid'){
                                            $status = '<span class="badge bg-success"><svg width="15px" height="15px" viewBox="0 0 1024 1024" class="icon" xmlns="http://www.w3.org/2000/svg"><path fill="#ffffff" d="M512 896a384 384 0 100-768 384 384 0 000 768zm0 64a448 448 0 110-896 448 448 0 010 896z"/><path fill="#ffffff" d="M745.344 361.344a32 32 0 0145.312 45.312l-288 288a32 32 0 01-45.312 0l-160-160a32 32 0 1145.312-45.312L480 626.752l265.344-265.408z"/></svg> Ready</span>';
                                        }else{
                                            $status = '<span class="badge bg-danger"> Cencel</span>';
                                        }
                                    ?>
                                    <tr style="font-size: 13px;">
                                        <td class="p-4"><?= $key+1 ?></td>
                                        <td class="p-4"><?= tgl_waktu_eng($value->created_at) ?></td>
                                        <td class="p-4"><?= $value->nama_brand ?></td>
                                        <td class="p-4"><?= $value->jenis ?></td>
                                        <td class="p-4"><?= $value->ukuran ?></td>
                                        <td class="p-4"><?= $status ?></td>
                                        <td class="p-4">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-dark dropdown-toggle rounded-0" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Aksi
                                                </button>
                                                <ul class="dropdown-menu p-3 shadow border-0 rounded">
                                                    <li><a class="dropdown-item p-2 py-3 rounded" href="<?= base_url('barcode/edit/'.$value->barcode_uuid) ?>"><svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 5H9C7.11438 5 6.17157 5 5.58579 5.58579C5 6.17157 5 7.11438 5 9V15C5 16.8856 5 17.8284 5.58579 18.4142C6.17157 19 7.11438 19 9 19H15C16.8856 19 17.8284 19 18.4142 18.4142C19 17.8284 19 16.8856 19 15V12M9.31899 12.6911L15.2486 6.82803C15.7216 6.36041 16.4744 6.33462 16.9782 6.76876C17.5331 7.24688 17.5723 8.09299 17.064 8.62034L11.2329 14.6702L9 15L9.31899 12.6911Z" stroke="#464455" stroke-linecap="round" stroke-linejoin="round"/></svg> Edit Data</a></li>
                                                    <li><a class="dropdown-item p-2 py-3 rounded" href="<?= base_url('barcode/cetak/'.$value->barcode_uuid) ?>"><svg fill="#000000" width="18px" height="18px" class="me-2" viewBox="0 0 56 56" xmlns="http://www.w3.org/2000/svg"><path d="M 34.4335 26.0664 L 45.0976 26.0664 C 48.0976 26.0664 49.5743 24.5664 49.5743 21.4727 L 49.5743 10.9961 C 49.5743 7.9023 48.0976 6.4258 45.0976 6.4258 L 34.4335 6.4258 C 31.4570 6.4258 29.9570 7.9023 29.9570 10.9961 L 29.9570 21.4727 C 29.9570 24.5664 31.4570 26.0664 34.4335 26.0664 Z M 10.9023 26.0664 L 21.5898 26.0664 C 24.5663 26.0664 26.0663 24.5664 26.0663 21.4727 L 26.0663 10.9961 C 26.0663 7.9023 24.5663 6.4258 21.5898 6.4258 L 10.9023 6.4258 C 7.9257 6.4258 6.4257 7.9023 6.4257 10.9961 L 6.4257 21.4727 C 6.4257 24.5664 7.9257 26.0664 10.9023 26.0664 Z M 10.9492 22.7617 C 10.1288 22.7617 9.7304 22.3398 9.7304 21.4727 L 9.7304 10.9961 C 9.7304 10.1523 10.1288 9.7305 10.9492 9.7305 L 21.5195 9.7305 C 22.3398 9.7305 22.7617 10.1523 22.7617 10.9961 L 22.7617 21.4727 C 22.7617 22.3398 22.3398 22.7617 21.5195 22.7617 Z M 34.4804 22.7617 C 33.6601 22.7617 33.2617 22.3398 33.2617 21.4727 L 33.2617 10.9961 C 33.2617 10.1523 33.6601 9.7305 34.4804 9.7305 L 45.0742 9.7305 C 45.8710 9.7305 46.2695 10.1523 46.2695 10.9961 L 46.2695 21.4727 C 46.2695 22.3398 45.8710 22.7617 45.0742 22.7617 Z M 14.2304 18.7071 L 18.2382 18.7071 C 18.5898 18.7071 18.7304 18.5664 18.7304 18.1680 L 18.7304 14.2774 C 18.7304 13.9023 18.5898 13.7617 18.2382 13.7617 L 14.2304 13.7617 C 13.8788 13.7617 13.7851 13.9023 13.7851 14.2774 L 13.7851 18.1680 C 13.7851 18.5664 13.8788 18.7071 14.2304 18.7071 Z M 37.9023 18.7071 L 41.8866 18.7071 C 42.2382 18.7071 42.3788 18.5664 42.3788 18.1680 L 42.3788 14.2774 C 42.3788 13.9023 42.2382 13.7617 41.8866 13.7617 L 37.9023 13.7617 C 37.5507 13.7617 37.4335 13.9023 37.4335 14.2774 L 37.4335 18.1680 C 37.4335 18.5664 37.5507 18.7071 37.9023 18.7071 Z M 10.9023 49.5742 L 21.5898 49.5742 C 24.5663 49.5742 26.0663 48.0977 26.0663 45.0039 L 26.0663 34.5039 C 26.0663 31.4336 24.5663 29.9336 21.5898 29.9336 L 10.9023 29.9336 C 7.9257 29.9336 6.4257 31.4336 6.4257 34.5039 L 6.4257 45.0039 C 6.4257 48.0977 7.9257 49.5742 10.9023 49.5742 Z M 31.5273 36.0039 L 35.5351 36.0039 C 35.8866 36.0039 36.0273 35.8633 36.0273 35.4649 L 36.0273 31.5742 C 36.0273 31.1992 35.8866 31.0586 35.5351 31.0586 L 31.5273 31.0586 C 31.1757 31.0586 31.0820 31.1992 31.0820 31.5742 L 31.0820 35.4649 C 31.0820 35.8633 31.1757 36.0039 31.5273 36.0039 Z M 43.9726 36.0039 L 47.9804 36.0039 C 48.3320 36.0039 48.4727 35.8633 48.4727 35.4649 L 48.4727 31.5742 C 48.4727 31.1992 48.3320 31.0586 47.9804 31.0586 L 43.9726 31.0586 C 43.6210 31.0586 43.5039 31.1992 43.5039 31.5742 L 43.5039 35.4649 C 43.5039 35.8633 43.6210 36.0039 43.9726 36.0039 Z M 10.9492 46.2695 C 10.1288 46.2695 9.7304 45.8477 9.7304 45.0039 L 9.7304 34.5274 C 9.7304 33.6602 10.1288 33.2383 10.9492 33.2383 L 21.5195 33.2383 C 22.3398 33.2383 22.7617 33.6602 22.7617 34.5274 L 22.7617 45.0039 C 22.7617 45.8477 22.3398 46.2695 21.5195 46.2695 Z M 14.2304 42.2383 L 18.2382 42.2383 C 18.5898 42.2383 18.7304 42.0977 18.7304 41.6758 L 18.7304 37.8086 C 18.7304 37.4336 18.5898 37.2930 18.2382 37.2930 L 14.2304 37.2930 C 13.8788 37.2930 13.7851 37.4336 13.7851 37.8086 L 13.7851 41.6758 C 13.7851 42.0977 13.8788 42.2383 14.2304 42.2383 Z M 37.8085 42.2383 L 41.8163 42.2383 C 42.1679 42.2383 42.3085 42.0977 42.3085 41.6758 L 42.3085 37.8086 C 42.3085 37.4336 42.1679 37.2930 41.8163 37.2930 L 37.8085 37.2930 C 37.4570 37.2930 37.3632 37.4336 37.3632 37.8086 L 37.3632 41.6758 C 37.3632 42.0977 37.4570 42.2383 37.8085 42.2383 Z M 31.5273 48.4492 L 35.5351 48.4492 C 35.8866 48.4492 36.0273 48.3086 36.0273 47.9102 L 36.0273 44.0195 C 36.0273 43.6445 35.8866 43.5039 35.5351 43.5039 L 31.5273 43.5039 C 31.1757 43.5039 31.0820 43.6445 31.0820 44.0195 L 31.0820 47.9102 C 31.0820 48.3086 31.1757 48.4492 31.5273 48.4492 Z M 43.9726 48.4492 L 47.9804 48.4492 C 48.3320 48.4492 48.4727 48.3086 48.4727 47.9102 L 48.4727 44.0195 C 48.4727 43.6445 48.3320 43.5039 47.9804 43.5039 L 43.9726 43.5039 C 43.6210 43.5039 43.5039 43.6445 43.5039 44.0195 L 43.5039 47.9102 C 43.5039 48.3086 43.6210 48.4492 43.9726 48.4492 Z"/></svg> Cetak Barcode</a></li>
                                                    <li><a class="dropdown-item p-2 py-3 rounded" href="<?= base_url('barcode/new?copy='.$value->barcode_uuid) ?>"><svg width="15px" height="15px" class="me-2" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"><path fill="#000000" d="M768 832a128 128 0 0 1-128 128H192A128 128 0 0 1 64 832V384a128 128 0 0 1 128-128v64a64 64 0 0 0-64 64v448a64 64 0 0 0 64 64h448a64 64 0 0 0 64-64h64z"/><path fill="#000000" d="M384 128a64 64 0 0 0-64 64v448a64 64 0 0 0 64 64h448a64 64 0 0 0 64-64V192a64 64 0 0 0-64-64H384zm0-64h448a128 128 0 0 1 128 128v448a128 128 0 0 1-128 128H384a128 128 0 0 1-128-128V192A128 128 0 0 1 384 64z"/></svg> Duplikat</a></li>
                                                    <li><a class="dropdown-item p-2 py-3 rounded text-danger" onclick="return confirm('Yakin ingin menghapus data ini?')" href="<?= base_url('barcode/delete/'.$value->barcode_uuid) ?>">Batalkan</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once('inc/footer.php') ?>