<x-app-layout>
    <!-- Product -->
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Contact</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item active">Contact</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>

        @elseif (session('succes'))
        <div class="alert alert-primary">
            {{ session('success') }}
        </div>
    @endif
        @foreach ($item as $index => $t)
            @if($index % 5 == 0)
                <!-- Start a new row after every 4 items -->
                <div class="row gy-5 custom-contact-row">
            @endif

            <div class="col-xl-3 custom-contact-col">
                <section class="section contact">
                    <div class="row gy-4">
                        <form action="update" method="post" id="updateform{{$t->id_barang}}">
                            @csrf
                            <div class="">
                                <div class="info-box card">
                                        <img src="image/{{ $t->image }}" alt="">
                                        <p><input type="text" name="name" value="{{ $t->name }}" class="form-control"></p>
                                        <p><input type="text" name="price" value="{{ $t->price }}" class="form-control" id="rupiah" oninput="formatRupiah(this)" name="price"></p>
                                        <p><select name="categori" id="" class="form-control">
                                            <option value="">{{ $t->categori }}</option>
                                            <option value="elektronik">elektronik</option>
                                            <option value="pakaian">pakaian</option>
                                            <option value="makanan">makanan</option>
                                            <option value="prabotan">prabotan</option>
                                            </select>
                                        </p>
                                        {{-- </div><div class="col-sm-10"> --}}
                                    <input type="text" name="id_barang" value="{{$t->id_barang}}" hidden/>
                                    <button type="submit" class="btn btn-primary">Submit Form</button>
                                  {{-- </div> --}}
                        </form>
                        <form action="delete" method="post" id="deleteform{{ $t->id_barang }}">
                                    @csrf
                                    <input type="text" name="id_barang" value="{{$t->id_barang}}" hidden/>
                                    <button type="submit" class="btn btn-danger">delete</button>
                        </form>
                            </div>
                    </div>
                </section>
            </div>

            @if (($index + 1) % 5 == 0 || $index + 1 == count($item))
                </div>
            @endif
        @endforeach

    </main>
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
        //
        let selectedForm = '';

    //
    function confirmation(index) {
        selectedForm = index;
        document.getElementById('confirmation').classList.toggle('hidden');
    }

    function executeIntent() {
        document.getElementById(selectedForm).submit();
        document.getElementById('confirmation').classList.toggle('hidden');
    }
    </script>
</x-app-layout>
