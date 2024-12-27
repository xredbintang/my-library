<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Form Sederhana dengan Laravel</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    h1 {
        color: #333;
    }

    form {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        width: 100%;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #333;
    }

    input[type="text"],
    select {
        width: calc(100% - 20px);
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
    }

    .button-86 {
        all: unset;
        width: 100%;
        height: 40px;
        font-size: 16px;
        background: #28282d;
        color: #f0f0f0;
        border-radius: 4px;
        position: relative;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.3s;
    }

    .button-86:hover {
        background: #333;
    }

    .button-86:active {
        background: #444;
    }

    .button-86::after,
    .button-86::before {
        content: '';
        position: absolute;
        bottom: 0;
        right: 0;
        z-index: -99999;
        transition: all .4s;
    }

    .button-86::before {
        transform: translate(0%, 0%);
        width: 100%;
        height: 100%;
        background: #28282d;
        border-radius: 4px;
    }

    .button-86::after {
        transform: translate(10px, 10px);
        width: 35px;
        height: 35px;
        background: #ffffff15;
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
        border-radius: 50px;
    }

    .button-86:hover::before {
        transform: translate(5%, 20%);
        width: 110%;
        height: 110%;
    }

    .button-86:hover::after {
        border-radius: 4px;
        transform: translate(0, 0);
        width: 100%;
        height: 100%;
    }

    .button-86:active::after {
        transition: 0s;
        transform: translate(0, 5%);
    }
</style>
</head>
<body>
<form>
    <h1>Form Sederhana dengan Laravel</h1>
    <label for="siswa">Nama siswa</label>
    <input type="text" name="siswa" id="siswa">
    <label for="kelas">Kelas</label>
    <input type="text" name="kelas" id="kelas">
    <label for="jurusan">Jurusan</label>
    <select name="jurusan" id="jurusan">
        <option value="RPL">RPL</option>
        <option value="TKJ">TKJ</option>
        <option value="SIJA">SIJA</option>
        <option value="TAB">TAB</option>
    </select>
    <button class="button-86" type="submit">Submit</button>
</form>
</body>
</html>
