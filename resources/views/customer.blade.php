<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vindhy Cell Login</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #5a5af8;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
      }

      .container {
        display: flex;
        max-width: 800px;
        overflow: hidden;
        box-sizing: content-box;
      }

      .left-box,
      .right-box {
        flex: 1;
        height: auto;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        box-sizing: border-box;
      }

      .left-box {
        padding: 30px;
        background-color: #5a5af8; /* Warna latar belakang sesuai dengan warna latar belakang halaman */
      }

      .right-box {
        padding: 50px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-color: #ffffff;
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

      @media (max-width: 750px) {
        .container {
          flex-direction: column;
          padding: 20px
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
    </style>
  </head>
  <body>
    <div class="container">
      <div class="left-box">
        <div class="header">
          <h1>Vindhy Cell</h1>
        </div>
      </div>
      <div class="right-box">
        <form action="{{ route('service.search') }}" method="GET">
          <input
            type="text"
            class="form-control"
            name="code_project"
            placeholder="Masukkan Kode Akses" />
          <button type="submit" class="btn">Submit</button>
        </form>
        <div class="footer">
          Jika tidak ada akses, Service dulu device anda pada Vindhy Cell.
        </div>
      </div>
    </div>
  </body>
</html>
