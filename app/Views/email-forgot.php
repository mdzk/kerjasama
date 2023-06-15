<html>

<head>
    <title>Lupa Password</title>
    <style>
        /* Card */
        .card {
            background-color: #fff;
            border: 1px solid rgba(0, 0, 0, 0.125);
            border-radius: 0.25rem;
            padding: 1rem;
        }

        /* Card Header */
        .card-header {
            padding: 0.5rem 1rem;
            margin-bottom: 0;
            background-color: rgba(0, 0, 0, 0.03);
            border-bottom: 1px solid rgba(0, 0, 0, 0.125);
        }

        /* Card Body */
        .card-body {
            flex: 1 1 auto;
            padding: 1rem;
        }

        /* Card Footer */
        .card-footer {
            padding: 0.5rem 1rem;
            background-color: rgba(0, 0, 0, 0.03);
            border-top: 1px solid rgba(0, 0, 0, 0.125);
        }

        /* Container */
        .container {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        /* Contoh penggunaan */
        .card {
            max-width: 800px;
            margin: 0 auto;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }

        .card-header {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .card-body {
            line-height: 1.5;
        }

        .card-footer {
            text-align: right;
        }

        .container {
            max-width: 960px;
        }

        .btn {
            display: inline-block;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            user-select: none;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out,
                border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            cursor: pointer;
        }

        .btn-primary {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #0069d9;
            border-color: #0062cc;
        }

        .btn-primary:focus,
        .btn-primary.focus {
            color: #fff;
            background-color: #0069d9;
            border-color: #0062cc;
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5);
        }

        .btn-primary.disabled,
        .btn-primary:disabled {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:not(:disabled):not(.disabled):active,
        .btn-primary:not(:disabled):not(.disabled).active,
        .show>.btn-primary.dropdown-toggle {
            color: #fff;
            background-color: #0062cc;
            border-color: #005cbf;
        }

        .btn-primary:not(:disabled):not(.disabled):active:focus,
        .btn-primary:not(:disabled):not(.disabled).active:focus,
        .show>.btn-primary.dropdown-toggle:focus {
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5);
        }
    </style>
</head>

<body>
    <section>
        <div class="container">

            <div class="card">
                <div class="card-header">
                    <h4>Lupa Password</h4>
                </div>
                <div class="card-body">
                    <p>Selamat anda berhasil melakukan reset password klik tombol berikut untuk melakukan reset password, jika tindakkan ini bukan anda yang melakukan maka abaikan!</p>
                    <a class="btn btn-primary" style="color:#fff;text-decoration: none;" href="<?= $link; ?>">RESET PASSWORD</a>
                </div>
            </div>
            <h5 align="center">
                Copyright &copy; Ajuin Kerjasama 2023
            </h5>
        </div>
    </section>
</body>

</html>