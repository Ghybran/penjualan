<x-app-layout>
    <main id="main" class="main">

        <div class="pagetitle">
          <h1>Form Elements</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item">Forms</li>
              <li class="breadcrumb-item active">Elements</li>
            </ol>
          </nav>
        </div><!-- End Page Title -->

        <section class="section">
          <div class="row">
            <div class="col-lg-6">

              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">General Form Elements</h5>

                  <!-- General Form Elements -->
                  @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @endif
                  <form method="POST" action="insert" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                      <label for="name_item" class="col-sm-2 col-form-label">Name Item</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="name">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="price" class="col-sm-2 col-form-label">Harga</label>
                      <div class="col-sm-10">
                        <label for="angka">Angka Terformat:</label>
                        <input type="text" id="rupiah" oninput="formatRupiah(this)" name="price">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="filename" class="col-sm-2 col-form-label">File Upload</label>
                      <div class="col-sm-10">
                        <input class="form-control" name="filename" type="file" id="formFile">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="filename" class="col-sm-2 col-form-label">categori</label>
                      <div class="col-sm-10">
                        <select class="form-control" id="idProgramStudi" name="category" required autofocus>
                        <option  value="">--pilih category--</option>
                        <option value="elektronik">elektronik</option>
                        <option value="food">food</option>
                        <option value="fashion">fashion</option>

                        </select>
                    </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label">Submit Button</label>
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Submit Form</button>
                      </div>

                    <script>
                      function formatRupiah(input) {
                        // Menghilangkan semua karakter selain angka
                        var value = input.value.replace(/\D/g, '');

                        // Mengubah nilai input menjadi format "Rp"
                        if (value.length > 0) {
                          value = 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
                        }

                        // Mengembalikan hasil format ke input
                        input.value = value;
                      }
                    </script>

                  </form><!-- End General Form Elements -->

                </div>
              </div>

            </div>

            <div class="col-lg-6">



            </div>
          </div>
        </section>

      </main><!-- End #main -->
</x-app-layout>
