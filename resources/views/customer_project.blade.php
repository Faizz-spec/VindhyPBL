<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vindhy Cell Login</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
      body {
        font-family: 'Inter', sans-serif;
        background-color: #5a5af8;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .container {
    max-width: 1200px;
    overflow: hidden;
    box-sizing: content-box;
    padding: 50px;
    width: 100%;
      }

      .header {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 30px;
      }

      .header img {
        width: 150px;
        height: auto;
        margin-bottom: 10px;
      }

      h1 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
      }

      .form-control {
        width: 100%;
        height: 40px;
        padding: 0 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 14px;
        box-sizing: border-box;
        text-align: center;
        margin-bottom: 15px;
      }

      .form-control:focus {
        outline: none;
        border-color: #007bff;
      }

      .btn {
        width: 100%;
        height: 45px;
        background-color: #007bff;
        color: #ffffff;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
      }

      .btn:hover {
        background-color: #0056b3;
      }

      .footer {
        text-align: center;
        font-size: 14px;
        color: #666;
        margin-top: 20px;
        margin-right: auto;
        margin-left: 1;
      }

      .bixbox {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
    width: 100%;
}.bixbox>div {
    background: #fff;
    border-radius: 5px;
    padding: 1rem;
    box-sizing: border-box;
}.mainbox {
  flex: 40%;
    max-width: 40%;
    overflow: hidden;
}.sidebox {
    flex: calc(60% - 15px);
    max-width: calc(60% - 15px);
}.thumb {
    position: relative;
    overflow: hidden;
}.thumb img {
    top: 0;
    width: 100%;
}.desc>p {
  font-size: 15px;
    color: #475569;
    line-height: 1.5;
    margin: 20px 0;
}.detail>div {
    display: flex;
    justify-content: space-between;
    font-size: 0.875rem;
    padding: 0.5rem 0;
    border-bottom: 1px solid #e2e8f0;
}.detail b {
  font-weight: 600;
}.back-button {
    margin: 30px 0 5px;
    display: flex;
    align-items: center;
    justify-content: center;
}.back-button a {
    padding: 8px 12px;
    font-family: inherit;
    font-weight: 600;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    box-shadow: 0px 0px 2px 0px #000;
    display: block;
    text-decoration: none;
    font-size: 14px;
}.bixbox h1 {
    font-size: 1.5rem;
}.bixbox h2 {
    font-size: 1.2rem;
    font-weight: 600;
}.sparepart p:not(:nth-last-child(1))::after {
  content: ',';
  margin-right: 2px;
}.sparepart p {
  display: inline-block;
  margin: 0;
}.brand {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 40px;
}.brand img {
    width: 80px;
}.detail span {
    text-align: right;
}
@media (max-width: 800px) {
  .mainbox {
    flex: 100%;
    max-width: 100%;
}.sidebox {
    flex: 100%;
    max-width: 100%;
}
}
      @media (max-width: 750px) {
        .container {
          flex-direction: column;
        }

        .left-box,
        .right-box {
          width: 100%;
          margin: 10px 0;
        }

        .header {
          margin-bottom: 0;
        }
      }
@media (max-width: 600px) {
  .container {
    padding: 20px;
  }
}
    </style>
  </head>
  <body>
    <div class="container">
      <div class="brand">
        <img src="{{ asset('assets/images/brand/logo') }}/vhindy.png" alt="logo">
      </div>
      <div class="bixbox">
        <div class="mainbox">
          <h1>{{ $project->name }}</h1>
            <div class="thumb">
                <img src="{{ asset('storage/' . $project->image) }}" alt="gambar">
            </div>
        </div>
        <div class="sidebox">
          <h2>Rincian</h2>
          <div class="desc">
            <p>
                {!! $project->deskripsi !!}
            </p> 
            <div class="detail">
              <div>
                  <b>Nama Pemilik</b>
                  <span>{{ $project->customer_name }}</span>
              </div>
              <div>
                <b>Status Pengerjaan</b>
                <span>
                  @switch($project->status->name)
                    @case('Queue')
                      Dalam antrian
                      @break
                    @case('On Progress')
                      Dalam pengerjaan
                    @break
                    @case('Done')
                      Selesai dikerjakan
                    @break
                    @case('Drop')
                      Dibatalkan
                    @break
                    @default
                      
                  @endswitch
                </span>
              </div>
              <div class="sparepart">
                <b>Sparepart yang dibutuhkan</b>
                <span>
                  @foreach ($project->sparepart as $sparepart)
                  <p>{{ $sparepart->name }}</p>
                @endforeach
                </span>
              </div>
              <div>
                <b>Type Device</b>
                <span>{{ $project->category->name }}</span>
              </div>
              <div>
                <b>Jumlah Biaya</b>
                <span>Rp. {{ $project->harga_total }}</span>
              </div>
            </div>
          </div>
          <div class="back-button">
            <a href="{{ route('service') }}">Kembali</a>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
