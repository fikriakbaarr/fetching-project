@extends('layouts.success')

@section('tittle')
    Register success page
@endsection

@section('content')
<div class="page-content page-success">
      <div class="section-success" data-aos="zoom-in">
        <div class="container">
          <div class="row align-items-center row-login justify-content-center">
            <div class="col-lg-6 text-center">
              <img src="/images/success.svg" alt="" class="mb-4" />
              <h2>
                Sealamat datang di Fetching project
              </h2>
              <p>
                Kamu sudah berhasil terdaftar <br />
                bersama kami. Let’s grow up now.
              </p>
              <div>
                <a class="btn btn-success w-50 mt-4" href="/dashboard.html">
                  My Dashboard
                </a>
                <a class="btn btn-signup w-50 mt-2" href="/index.html">
                  Go To Shopping
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endsection