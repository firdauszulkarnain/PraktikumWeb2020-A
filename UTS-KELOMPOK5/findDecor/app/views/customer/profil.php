<!-- CONTENT START -->
<section class="content mb-5">
   <div class="container">
      <div class="row ">
         <div class="col-lg-2 mt-5">
            <div class="menu">
               <ul class="nav mt-3">
                  <?php include "sidebar.php" ?>
               </ul>
            </div>
         </div>
         <div class="user-content col-lg-10">
            <div class="card mt-5 p-3 mb-5">
               <div class="container">
                  <p class="font">PROFIL SAYA</p>
                  <hr class="mt-n2">
                  <form action="<?= BASE_URL; ?>customer/update_profil" method="POST" enctype="multipart/form-data">
                     <div class="row">
                        <div class="col-lg-8 mt-3">
                           <div class="form-group row">
                              <label for="text" class="col-sm-3 col-form-label ">Username</label>
                              <div class="col-sm-9">
                                 <input type="text" class="form-control" name="username" id="username" value="<?= $data['user']['username']; ?>" autocomplete="off">
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="text" class="col-sm-3 col-form-label ">Nama</label>
                              <div class="col-sm-9">
                                 <input type="text" class="form-control " name="nama" id="nama" value="<?= $data['user']['nama']; ?>" autocomplete="off">
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="text" class="col-sm-3 col-form-label ">E-mail</label>
                              <div class="col-sm-9">
                                 <input type="text" class="form-control " name="email" id="email" value="<?= $data['user']['email']; ?>" autocomplete="off">
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="text" class="col-sm-3 col-form-label ">No. Telp</label>
                              <div class="col-sm-9">
                                 <input type="text" class="form-control " name="notelp" id="notelp" value="<?= $data['user']['notelp']; ?>" autocapitalize="off">
                              </div>
                           </div>
                           <a href="<?= BASE_URL ?>customer/ubah_sandi" class="btn btn-sm tombol  mb-3 p-2">UBAH KATA SANDI</a>
                        </div>
                        <div class="col-lg-4">
                           <div class="card warna mb-3 p-2">
                              <img src="<?= URL_IMG ?>profile/<?= $data['user']['foto']; ?>" class="rounded-circle mx-auto border border-white" width="70%">
                              <div class="form-group">
                                 <input type="file" class="form-control-file mt-3 border border-light" name="foto" value="<?= $data['user']['foto']; ?>">
                              </div>
                           </div>
                           <button type="submit" name="setprofil" class="btn btn-md btn-block tombol mb-3 float-right">SIMPAN</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>

</section>
<!--  -->