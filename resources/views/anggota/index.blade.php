<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Anggota</title>
</head>

<body>
  <table>
    <thead>
      <tr>
        <th>nomor anggota</th>
        <th>nama</th>
        <th>wajib</th>
        <th>pokok</th>
        <th>saldo</th>
        <th>aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($anggota as $i)
      <tr>
      <td>{{ $i['no_anggota'] }}</td>
      <td>{{ $i['nama'] }}</td>
      <td>{{ $i['wajib'] }}</td>
      <td>{{ $i['pokok'] }}</td>
      <td>{{ $i['saldo'] }}</td>
      <td>
        <a href="{{ route('anggota.edit', $i['no_anggota']) }}">Edit</a>
        <form action="{{ route('anggota.destroy', $i['no_anggota']) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Hapus</button>
        </form>
      </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</body>

</html>
