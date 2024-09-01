<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data {{ $data['title'] }}</title>
</head>

<body>
  <main>
    <h1>Data {{ $data['title'] }}</h1>
    <a href="{{ route($data['name_route'] . ".create") }}">Tambah {{ $data['title'] }}</a>
    <table>
      <thead>
        <tr>
          @foreach ($data['columns'] as $c)
        <th style="text-transform: capitalize">{{ $c }}</th>
      @endforeach
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($items as $item)
          <tr>
            @php
        $keys = $item->getAttributes();
        $k = array_keys($keys);
        @endphp
            @foreach ($keys as $v)
        <td>{{$v}}</td>
      @endforeach
            <td>
            <a href="{{ route($data['name_route'] . ".edit", $item[$k[0]]) }}">Edit</a>
            <form action="{{ route($data['name_route'] . ".destroy", $item[$k[0]]) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit">Hapus</button>
            </form>
            </td>
          </tr>
    @endforeach
      </tbody>
    </table>
  </main>
</body>

</html>
