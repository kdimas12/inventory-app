@extends("layouts.app")

@section("content")
  <!-- Breadcrumb -->
  <nav
    class="mb-5 justify-between rounded-lg border border-gray-200 bg-white px-4 py-5 text-gray-700 sm:flex sm:px-5"
    aria-label="Breadcrumb"
  >
    <ol
      class="mb-3 inline-flex items-center space-x-1 sm:mb-0 md:space-x-2 rtl:space-x-reverse"
    >
      <li>
        <div class="flex items-center">
          <a
            href="{{ route("dashboard.index") }}"
            class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white md:ms-2"
          >
            Dashboard
          </a>
        </div>
      </li>
      <li>
        <div class="flex items-center">
          <svg
            class="mx-1 h-3 w-3 text-gray-400 rtl:rotate-180"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 6 10"
          >
            <path
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="m1 9 4-4-4-4"
            />
          </svg>
          <a
            href="{{ route("product.index") }}"
            class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white md:ms-2"
          >
            Transaksi Pembelian
          </a>
        </div>
      </li>
      <li aria-current="page">
        <div class="flex items-center">
          <svg
            class="mx-1 h-3 w-3 text-gray-400 rtl:rotate-180"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 6 10"
          >
            <path
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="m1 9 4-4-4-4"
            />
          </svg>
          <span
            class="mx-1 text-sm font-medium text-gray-500 dark:text-gray-400 md:mx-2"
          >
            Tambah
          </span>
        </div>
      </li>
    </ol>
  </nav>

  <div
    class="mx-auto max-w-screen-xl rounded-lg border border-gray-200 bg-white p-4 dark:border-gray-700 dark:bg-gray-800 sm:p-6"
  >
    <form action="{{ route("sales.store") }}" method="POST">
      @csrf
      <div class="mb-4 grid gap-4 sm:grid-cols-2">
        <div>
          <label
            for="invoice_number"
            class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
          >
            Invoice
          </label>
          <input
            type="text"
            name="invoice_number"
            id="invoice_number"
            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
            required=""
            value="{{ $invoiceNumber }}"
            readonly
          />
        </div>
        <div>
          <label
            for="sale_date"
            class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
          >
            Tanggal Beli
          </label>
          <input
            type="date"
            name="sale_date"
            id="sale_date"
            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
            required=""
          />
        </div>
        <div class="col-span-2">
          <label
            for="customer_name"
            class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
          >
            Pelanggan
          </label>
          <input
            type="text"
            name="customer_name"
            id="customer_name"
            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
            placeholder="Tuliskan nama pelanggan"
            required=""
          />
        </div>
        <div class="col-span-2">
          <label
            for="products"
            class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
          >
            Barang
          </label>
          <div id="product-container">
            <!-- Dynamic rows for products will be appended here -->
          </div>
          <button
            type="button"
            id="add-product"
            class="inline-flex items-center rounded-lg bg-blue-700 px-5 py-2 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
          >
            Tambah Barang
          </button>
        </div>
        <div>
          <label
            for="payment_status"
            class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
          >
            Status Pembayaran
          </label>
          <select
            id="payment_status"
            name="payment_status"
            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
          >
            <option selected>Pilih status pembayaran</option>
            <option value="lunas">Lunas</option>
            <option value="belum_lunas">Belum Lunas</option>
          </select>
        </div>
        <div>
          <label
            for="payment_method"
            class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
          >
            Metode Pembayaran
          </label>
          <select
            id="payment_method"
            name="payment_method"
            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
          >
            <option selected>Pilih metode pembayaran</option>
            <option value="tunai">Tunai</option>
            <option value="transfer">Transfer</option>
          </select>
        </div>
      </div>
      <button
        type="submit"
        class="inline-flex items-center rounded-lg bg-green-700 px-5 py-2 text-center text-sm font-medium text-white hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
      >
        <svg
          class="-ml-1 mr-1 h-6 w-6"
          fill="currentColor"
          viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            fill-rule="evenodd"
            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
            clip-rule="evenodd"
          ></path>
        </svg>
        Simpan
      </button>
    </form>
  </div>
@endsection

@push("scripts")
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      let productIndex = 0;

      // Tambah produk secara dinamis
      document.getElementById('add-product').addEventListener('click', function() {
        productIndex++;

        const productRow = document.createElement('div');
        productRow.classList.add('product-row', 'mb-4', 'flex', 'items-center', 'space-x-4');
        productRow.innerHTML = `
                <select name="products[${productIndex}][id]" 
                        class="product-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        data-index="${productIndex}">
                    <option value="" disabled selected>Pilih Barang</option>
                    @foreach ($products as $product)
                        <option value="{{ $product['id'] }}" {{ $product['quantity'] == 0 ? 'disabled' : '' }} data-sell-price="{{ $product['sell_price'] }}">
                            {{ $product['name'] }}
                        </option>
                    @endforeach
                </select>
                <input type="number" name="products[${productIndex}][quantity]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Kuantitas" oninput="calculateSubTotal(${productIndex})">
                <input type="number" name="products[${productIndex}][sell_price]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Harga Jual" readonly>
                <input type="number" name="products[${productIndex}][sub_total]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Sub Total" readonly>
                <button type="button" class="remove-product text-white inline-flex items-center bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Hapus</button>
            `;
        document.getElementById('product-container').appendChild(productRow);
      });

      // Hapus produk
      document.getElementById('product-container').addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-product')) {
          event.target.parentElement.remove();
        }
      });

      // Ambil harga jual produk
      document.getElementById('product-container').addEventListener('change', function(event) {
        if (event.target.classList.contains('product-select')) {
          const selectedOption = event.target.options[event.target.selectedIndex];
          const sellPrice = selectedOption.getAttribute('data-sell-price');
          const index = event.target.getAttribute('data-index');

          // Set harga jual pada input
          document.querySelector(`[name="products[${index}][sell_price]"]`).value = sellPrice;
          calculateSubTotal(index); // Hitung sub-total setelah harga diambil
        }
      });

      // Hitung sub-total
      window.calculateSubTotal = function(index) {
        const quantity = document.querySelector(`[name="products[${index}][quantity]"]`).value;
        const sellPrice = document.querySelector(`[name="products[${index}][sell_price]"]`).value;
        const subTotal = (quantity && sellPrice) ? quantity * sellPrice : 0; // Cek jika nilai ada
        document.querySelector(`[name="products[${index}][sub_total]"]`).value = subTotal;
      };
    });
  </script>
@endpush
