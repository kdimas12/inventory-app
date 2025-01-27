@extends("layouts.app")

@section("content")
  <div class="grid grid-cols-1 gap-4 sm:grid-cols-4">
    <div
      class="flex items-center overflow-hidden rounded-md border bg-white shadow"
    >
      <div class="bg-green-400 p-4">
        <svg
          class="h-12 w-12 text-white"
          aria-hidden="true"
          xmlns="http://www.w3.org/2000/svg"
          width="24"
          height="24"
          fill="none"
          viewBox="0 0 24 24"
        >
          <path
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M4 15v2a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-2m-8 1V4m0 12-4-4m4 4 4-4"
          />
        </svg>
      </div>
      <div class="px-4 text-gray-700">
        <h3 class="text-sm tracking-wider">Total Pembelian</h3>
        <p class="text-2xl font-medium">
          {{ "Rp " . number_format($data["totalPurchase"], 2, ",", ".") }}
        </p>
      </div>
    </div>
    <div
      class="flex items-center overflow-hidden rounded-md border bg-white shadow"
    >
      <div class="bg-blue-400 p-4">
        <svg
          class="h-12 w-12 text-white"
          aria-hidden="true"
          xmlns="http://www.w3.org/2000/svg"
          width="24"
          height="24"
          fill="none"
          viewBox="0 0 24 24"
        >
          <path
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M4 15v2a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-2M12 4v12m0-12 4 4m-4-4L8 8"
          />
        </svg>
      </div>
      <div class="px-4 text-gray-700">
        <h3 class="text-sm tracking-wider">Total Penjualan</h3>
        <p class="text-2xl font-medium">
          {{ "Rp " . number_format($data["totalSale"], 2, ",", ".") }}
        </p>
      </div>
    </div>
    <div
      class="flex items-center overflow-hidden rounded-md border bg-white shadow"
    >
      <div class="bg-indigo-400 p-4">
        <svg
          class="h-12 w-12 text-white"
          aria-hidden="true"
          xmlns="http://www.w3.org/2000/svg"
          width="24"
          height="24"
          fill="currentColor"
          viewBox="0 0 24 24"
        >
          <path
            fill-rule="evenodd"
            d="M4 4a2 2 0 0 0-2 2v9a1 1 0 0 0 1 1h.535a3.5 3.5 0 1 0 6.93 0h3.07a3.5 3.5 0 1 0 6.93 0H21a1 1 0 0 0 1-1v-4a.999.999 0 0 0-.106-.447l-2-4A1 1 0 0 0 19 6h-5a2 2 0 0 0-2-2H4Zm14.192 11.59.016.02a1.5 1.5 0 1 1-.016-.021Zm-10 0 .016.02a1.5 1.5 0 1 1-.016-.021Zm5.806-5.572v-2.02h4.396l1 2.02h-5.396Z"
            clip-rule="evenodd"
          />
        </svg>
      </div>
      <div class="px-4 text-gray-700">
        <h3 class="text-sm tracking-wider">Total Supplier</h3>
        <p class="text-2xl font-medium">{{ $data["totalSupplier"] }}</p>
      </div>
    </div>
    <div
      class="flex items-center overflow-hidden rounded-md border bg-white shadow"
    >
      <div class="bg-red-400 p-4">
        <svg
          class="h-12 w-12 text-white"
          aria-hidden="true"
          xmlns="http://www.w3.org/2000/svg"
          width="24"
          height="24"
          fill="currentColor"
          viewBox="0 0 24 24"
        >
          <path
            fill-rule="evenodd"
            d="M5.024 3.783A1 1 0 0 1 6 3h12a1 1 0 0 1 .976.783L20.802 12h-4.244a1.99 1.99 0 0 0-1.824 1.205 2.978 2.978 0 0 1-5.468 0A1.991 1.991 0 0 0 7.442 12H3.198l1.826-8.217ZM3 14v5a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-5h-4.43a4.978 4.978 0 0 1-9.14 0H3Zm5-7a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm0 2a1 1 0 0 0 0 2h8a1 1 0 1 0 0-2H8Z"
            clip-rule="evenodd"
          />
        </svg>
      </div>
      <div class="px-4 text-gray-700">
        <h3 class="text-sm tracking-wider">Total Barang</h3>
        <p class="text-2xl font-medium">{{ $data["totalProduct"] }}</p>
      </div>
    </div>
  </div>
@endsection
