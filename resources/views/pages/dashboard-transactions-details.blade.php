@extends('layouts.dashboard')
@section('title')
    Store Dashboard Transaction Details
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">{{ $transaction->code }}</h2>
                <p class="dashboard-subtitle">
                    Transaksi detail
                </p>
            </div>
            <div class="dashboard-content" id="transactionDetails">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <img src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '') }}"
                                            alt="" class="w-100 mb-3" />
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <div class="row">

                                            <div class="col-12 col-md-6">
                                                <div class="product-title">Nama pembeli</div>
                                                <div class="product-subtitle">
                                                    {{ $transaction->transaction->user->name }}
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <div class="product-title">Nama produk</div>
                                                <div class="product-subtitle">
                                                    {{ $transaction->product->name }}
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="product-title">
                                                    Tanggal transaksi
                                                </div>
                                                <div class="product-subtitle">
                                                    {{ $transaction->created_at }}
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="product-title">Status pembayaran</div>
                                                <div class="product-subtitle text-danger">
                                                    {{ $transaction->transaction->transaction_status }}
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="product-title">Jumlah harga</div>
                                                <div class="product-subtitle">
                                                    Rp.{{ number_format($transaction->transaction->total_price) }}
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="product-title">Nomor telepon</div>
                                                <div class="product-subtitle">
                                                    {{ $transaction->transaction->user->phone_number }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ route('dashboard-transaction-update', $transaction->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 mt-4">
                                            <h5>
                                                informasi alamat
                                            </h5>
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <div class="product-title">Alamat</div>
                                                    <div class="product-subtitle">
                                                        {{ $transaction->transaction->user->addres }}
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6">
                                                    <div class="product-title">
                                                        Provinsi
                                                    </div>
                                                    <div class="product-subtitle">
                                                        {{ App\Models\Province::find($transaction->transaction->user->provinces_id)->name }}
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="product-title">Kota</div>
                                                    <div class="product-subtitle">
                                                        {{ App\Models\Regency::find($transaction->transaction->user->regencies_id)->name }}
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="product-title">Kode pos</div>
                                                    <div class="product-subtitle">
                                                        {{ $transaction->transaction->user->zip_code }}</div>
                                                </div>

                                                {{-- <div class="col-12 col-md-3">
                                                    <div class="product-title">Shipping status</div>
                                                    <select name="shipping_status" id="status" class="form-control"
                                                        v-model="status">
                                                        <option value="PENDING">Pending</option>
                                                        <option value="SHIPPING">Shipping</option>
                                                        <option value="SUCCESS">Sucess</option>
                                                    </select>
                                                </div>

                                                <div class="col-12">
                                                    <div class="row">
                                                        <template v-if="status == 'SHIPPING'">
                                                            <div class="col-md-3">
                                                                <div class="product-title">Input Resi</div>
                                                                <input type="text" class="form-control" name="resi"
                                                                    v-model="resi" />
                                                            </div>
                                                            <div class="col-md-2">
                                                                <button type="submit"
                                                                    class="btn btn-success btn-block mt-4">
                                                                    Update resi
                                                                </button>
                                                            </div>
                                                    </div> --}}

                                                </template>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-mt-4">
                                        <div class="col-12 text-right">
                                            <button type="submit" class="btn btn-success btn-lg mt-4">
                                                Save now
                                            </button>
                                        </div>
                                    </div> --}}
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script>
        var transactionDetails = new Vue({
            el: "#transactionDetails",
            data: {
                status: "{{ $transaction->shipping_status }}",
                resi: "{{ $transaction->resi }}",
            },
        });
    </script>
@endpush
