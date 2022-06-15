<div>
    @if ($message = Session::get('message'))
    <div class="alert alert-success">
        <strong>{{$message}}</strong>
    </div>
    @endif
    {{-- <livewire:post-create :data=$data></livewire:post-create> --}}
    @if ($status)
    <livewire:post-update></livewire:post-update>
    @else
    <livewire:post-create></livewire:post-create>
    @endif

    <div class="row mt-3">
        <div class="col">
            <select wire:model="paginate" name="" class="form-control form-control-sm w-auto">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
            </select>
        </div>
        <div class="col">
            <input wire:model="search" value="gsg" name="" type="text" placeholder="Cari Kegiatan" class="form-control">
        </div>
    </div>
    @if ($data->isNotEmpty())
    @foreach ($data as $post)
    <div class="card my-3">
        <div class="card-body">
            <div class="float-start">
                <h3>{{$loop->iteration}}. {{$post->name}}</h3>
                <span class="text-muted">Tanggal Mulai : {{$post->start_date}}</span><br>
                <span class="text-muted">Tanggal Selesai : {{$post->end_date}}</span>
            </div>
            <div class="float-end">
                <button wire:click="getPost({{$post->id}})" class="btn btn-primary">Edit</button>
                <button wire:click="postDelete({{$post->id}})" class="btn btn-danger">Hapus</button>
            </div>
        </div>
    </div>
    @endforeach
    {{ $data->links() }}
    @else
        <div class="card my-3">
            <div class="card-body">
                <h3 class="text-danger">Data Pencarian Tidak Ada.!</h3>
            </div>
        </div>
    @endif
</div>
