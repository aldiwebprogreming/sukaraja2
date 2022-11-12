  


<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.0/fullcalendar.print.css' rel='stylesheet' media='print' />


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper mt-3">
  <div class="container">

    <div class="card">
      <div class="card-body">

        <script>
          $(document).ready(function(){
            var total = 0;
            $("#totalhargaall").val(total);
          })
        </script>

        <?php 
        $kode = 'faktur-'.rand(0,10000);
        ?>

        <form method="post" action="<?= base_url('utama/add_penjualan') ?>">
          <div class="row">
            <div class="col">
              <input type="text" class="form-control" name="kode" placeholder="kod penjualan" value="<?= $kode ?>">
            </div>
            <div class="col">
             <select class="form-control" name="pelanggan" id="pelanggan" required>
              <option value="">-- Pilih Nama Pelanggan --</option>
              <?php foreach ($pelanggan as $data) {  ?>
                <option value="<?= $data['id'] ?>"><?= $data['nama_pelanggan'] ?></option>
              <?php } ?>
            </select>
          </div>

        </div>
        <div class="row mt-2">
          <div class="col">
            <textarea class="form-control" name="alamat" id="alamat" required></textarea>
          </div>
          <div class="col" style="display: none;">
            <input type="date" class="form-control" name="tgl" placeholder="Tanggal" value="<?= date('Y-m-d') ?>" name="tanggal" >
          </div>

          <div class="col">
            <textarea class="form-control" name="nb" placeholder="Masukan keterangan "></textarea>
            <small style="font-style: italic;">Tuliskan keterangan jika dibutuhkan</small>
          </div>
        </div>
        <br>
        <table class="table mt-2">
          <thead>
            <tr>
              <th>No</th>
              <th>Itam</th>
              <th>Harga@</th>
              <th>Qty</th>
              <!-- <th>Diskon</th> -->
              <th>Total Harga</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1;
            ?>
            <?php for ($i=0; $i < 15 ; $i++) {  ?>
              <tr>
                <td><?= $no++ ?></td>
                <td>
                  <select class="js-example-basic-single form-control text-center" id="barang<?= $i ?>" name="barang[]" style="width: 300px;">
                    <option value="">-- Pilih Produk --</option>
                    <?php foreach ($produk as $data) { ?>
                      <option value="<?= $data['id'] ?>"><?= $data['nama_produk'] ?></option>
                    <?php } ?>
                  </select>
                </td>
                <td>
                  <p id="harga<?= $i ?>" style="display: none;">Rp.0</p>
                  <!-- <p id="harga2<?= $i ?>">Rp.0</p> -->
                  <textarea  class="form-control" id="harga2<?= $i ?>" style="width: 100px; height: 30px;"></textarea>

                </td>
                <td>
                  <p><input type="text" onkeypress="return hanyaAngka(event)"/ name="qty[]" class="text-center" id="qty<?= $i ?>" style="width: 100px;"></p>
                </td>
                <!-- <td>
                  <textarea  class="form-control" id="diskon<?= $i ?>" style="width: 100px; height: 30px;"></textarea>
                </td> -->
                <td>
                  <!-- <p id="totalharga<?= $i ?>">Rp.0</p> -->
                  <textarea id="totalharga<?= $i ?>"></textarea>
                </td>


              </tr>

              <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
              <script>
                $(document).ready(function(){
                  var total = 0;
                  $("#barang<?= $i ?>").change(function(){
                    const val = $(this).val();
                    const url = "<?= base_url('utama/get_harga?id=') ?>"+val;
                    const url2 = "<?= base_url('utama/get_harga2?id=') ?>"+val;
                    const url_diskon = "<?= base_url('utama/get_diskon?id=') ?>"+val;

                    $("#harga<?= $i ?>").load(url);
                    $("#harga2<?= $i ?>").load(url2);
                    $("#diskon<?= $i ?>").load(url_diskon);

                    $("#qty<?= $i ?>").val('');
                    $("#totalharga<?= $i ?>").val('Rp.0');
                  // $("#diskon<?= $i ?>").val('Rp.0');



                })

                  $("#qty<?= $i ?>").keyup(function(){
                    const qty = $(this).val();
                    const harga = $("#harga2<?= $i ?>").val();
                    const total_harga = qty * harga;
                    const numb = total_harga;
                    const format = numb.toString().split('').reverse().join('');
                    const convert = format.match(/\d{1,3}/g);
                    const rupiah = '' + convert.join('.').split('').reverse().join('')+"";
                    $("#totalharga<?= $i ?>").val(rupiah);


                    var s = $("#totalharga0").val();
                    var punctuationless = s.replace(/[.,\/#!$%\^&\*;:{}=\-_`~()]/g,"");
                    var valtotal0 = punctuationless.replace(/\s{2,}/g," ");
                    // var valtotal0 = $("#totalharga0").val();


                    var s = $("#totalharga1").val();
                    var punctuationless = s.replace(/[.,\/#!$%\^&\*;:{}=\-_`~()]/g,"");
                    var valtotal1 = punctuationless.replace(/\s{2,}/g," ");
                    // var valtotal0 = $("#totalharga0").val();


                    // var valtotal1 = $("#totalharga1").val();
                    var valtotal2 = $("#totalharga2").val();
                    var valtotal3 = $("#totalharga3").val();
                    var valtotal4 = $("#totalharga4").val();
                    var valtotal5 = $("#totalharga5").val();
                    var valtotal6 = $("#totalharga6").val();
                    var valtotal7 = $("#totalharga7").val();


                    var valtotal8 = $("#totalharga8").val();
                    var valtotal9 = $("#totalharga9").val();
                    var valtotal10 = $("#totalharga10").val();
                    var valtotal11 = $("#totalharga11").val();
                    var valtotal12 = $("#totalharga12").val();
                    var valtotal13 = $("#totalharga13").val();
                    var valtotal14 = $("#totalharga14").val();
                    // var valtotal7 = $("#totalharga7").val();



                    var totalku = Number(valtotal0) + Number(valtotal1) + Number(valtotal2) + Number(valtotal3) + Number(valtotal4) + Number(valtotal5) + Number(valtotal6) + Number(valtotal7) + Number(valtotal8) + Number(valtotal9) + Number(valtotal10) + Number(valtotal11) + Number(valtotal12) + Number(valtotal13) + Number(valtotal14);
                    $("#totalhargaall").val(totalku);

                  });

                  $("#harga2<?= $i ?>").keyup(function(){
                    const harga = $(this).val();
                    const qty = $("#qty<?= $i ?>").val();
                   // const harga = $("#harga<?= $i ?>").html();
                   const total_harga = qty * harga;
                   const numb = total_harga;
                   const format = numb.toString().split('').reverse().join('');
                   const convert = format.match(/\d{1,3}/g);
                   const rupiah = '' + convert.join('.').split('').reverse().join('')+".000";
                   $("#totalharga<?= $i ?>").val(rupiah);
                   
                 });

                  $("#diskon<?= $i ?>").keyup(function(){
                    const harga = $("#totalharga<?= $i ?>").val();
                    const diskon = $(this).val();
                    const persen = diskon / 100;
                    const hasil_potongan = harga * persen;
                    alert(hasil_potongan);

                  })

                })
              </script>

            <?php } ?>
          </tbody>
        <!--   <tfoot>
            <tr>
             <th>No</th>
             <th>Itam</th>
             <th>Harga@</th>
             <th>Qty</th>
             <th>Total Harga</th>

           </tr>
         </tfoot> -->
       </table>
       <h5 style="font-weight: bold;">Total Harga : </h5>
       <input type="text" class="form-control" name="" id="totalhargaall" value="" style="font-weight: bold; font-size: 20px;">
       <?php 

       $harga = '150000';
       $diskon = '50';
       $persen = $diskon / 100;
       $potongan = $harga * $persen;
     // echo $potongan;

       ?>
       <button class="btn btn-primary btn-block mt-3" style="font-weight: bold;">CETAK FAKTUR <i class="fas fa-file"></i></button>
       <a href="<?= base_url('utama/penjualan') ?>" class="btn btn-success btn-block" style="font-weight: bold;">REFRESH</a>
     </form>

   </div>
 </div>

</div>
</div>

<!-- /.content-wrapper -->
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<script>
  $(document).ready(function(){
    $("#pelanggan").change(function(){
      var id = $(this).val();
      var url = "<?= base_url('utama/get_alamat?id=') ?>"+id;
      $("#alamat").load(url);
    })
  })
</script>

<script>
  function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))

      return false;
    return true;
  }
</script>

<script>
  var s = "35.500";
  var punctuationless = s.replace(/[.,\/#!$%\^&\*;:{}=\-_`~()]/g,"");
  var finalString = punctuationless.replace(/\s{2,}/g," ");
  console.log(finalString);
</script>














