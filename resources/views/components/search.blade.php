<style>
   .list-group-item {
        width: 375px;

    }
    .search-results{
        position:absolute
    }
</style>

<div class="col-md-6">
    <label for="name" class="form-label">Buscar</label>
    <input class="form-control" id="myInput" type="text" placeholder="Search..">
    <br>

    <div class="search-results">
        @foreach ( $clients as $client )
            <div class="list-group-item">{{$client->name}}</div>
            {{-- <div class="list-group-item">Third item</div> --}}
            {{-- <div class="list-group-item">Fourth</div> --}}
        @endforeach

    </div>
    <ul class="list-group" id="myList">
    </ul>
</div>
