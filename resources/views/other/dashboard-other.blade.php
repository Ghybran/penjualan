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

        @foreach ($other as $index => $t)
            @if($index % 5 == 0)
                <!-- Start a new row after every 4 items -->
                <div class="row gy-5 custom-contact-row">
            @endif

            <div class="col-xl-3 custom-contact-col">
                <section class="section contact">
                    <div class="row gy-4">
                        <div class="">
                            <div class="info-box card">
                                <img src="image/{{ $t->image }}" alt="">
                                <p>{{ $t->name }}</p>
                                <p>{{ $t->price }}</p>
                                <button class="btn btn-outline-success order-btn" data-product-id="{{ $t->id_barang }}" data-product-name="{{ $t->name }}" data-product-price="{{ $t->price }}">Order</button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            @if (($index + 1) % 5 == 0 || $index + 1 == count($other))
                </div>
            @endif
        @endforeach

    </main>

    <div class="modal col-xl-6" id="orderModal">
        <br><br><br><br><br>
        <span class="close col-md-6">&times;</span>
        <div class="modal-content card p-4" style="width: 50%; margin: 0 auto;">
            <form action="#" id="orderForm" method="post" class="php-email-form">
                <div class="row gy-4">

                    <div class="col-md-6">
                        <label for="productName">Product Name:</label>
                        <input id="productName" type="text" name="name" class="form-control" placeholder="Your Name" required readonly>
                    </div>

                    <div class="col-md-6">
                        <label for="price">harga:</label>
                        <input id="price" type="text" class="form-control" name="price" placeholder="Your Email" required readonly>
                    </div>

                    <div class="col-md-12">
                        <label for="subject">jumlah</label>
                            <input id="quantity" type="number" class="form-control" name="quantity" value="1" required>
                    </div>

                    <div class="col-md-12">
                        <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                    </div>

                    <div class="col-md-12 text-center">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>

                        <button type="submit">Send Message</button>
                        <button type="button" class="btn cancel" onclick="closeForm()" id="close">Close</button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <script>
        // Di dalam blok JavaScript

        // ...


        var quantityInput = document.getElementById('quantity');
        var modal = document.getElementById('orderModal');
        var buttons = document.querySelectorAll('.custom-contact-col .order-btn');
        var span = document.getElementsByClassName('close')[0];
        var productNameInput = document.getElementById('productName');
        var priceInput = document.getElementById('price');
        var orderForm = document.getElementById('orderForm');

        quantityInput.addEventListener('change', function() {
            updateTotalPrice();
        });

        function updateTotalPrice() {
            var price = parseFloat(priceInput.value);
            var quantity = parseInt(quantityInput.value);

            if (!isNaN(price) && !isNaN(quantity)) {
                var totalPrice = price * quantity;
                // Menetapkan nilai baru pada input harga
                priceInput.value = totalPrice.toFixed(2);
            }
        }


        buttons.forEach(function(button) {
            button.addEventListener('click', function() {
                // Mengisi nilai input modal berdasarkan barang yang diklik
                productNameInput.value = button.getAttribute('data-product-name');
                priceInput.value = button.getAttribute('data-product-price');
                modal.style.display = 'block';
            });
        });

        span.onclick = function() {
            modal.style.display = 'none';
        };

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        };

        orderForm.addEventListener('submit', function(event) {
            event.preventDefault();
            // Add logic to handle form submission
            // You can use AJAX to send the form data to the server
            // and update the modal content based on the server response
            // or redirect the user to a thank you page, etc.
            alert('Order submitted successfully!');
            modal.style.display = 'none';
        });
    </script>
</x-app-layout>
