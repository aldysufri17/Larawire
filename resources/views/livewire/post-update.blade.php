<div>
    <form wire:submit.prevent="update">
        <input hidden type="text" wire:model="{{$postId}}">
        <div class="form-group">
            <div class="row justify-content-md-start">
                <div class="col-sm-7">
                    <label class="text-muted" for="name"><span class="text-danger">*</span> Nama</label>
                    <input  wire:model="name" type="text" class="form-control @error('name')is-invalid @enderror" placeholder="Nama Kegiatan">
                    @error('name')
                        <span class="invalid-feedback">
                                {{ $message }}
                         </span>
                    @enderror
                </div>
                <div class="col-auto">
                    <label class="text-muted" for="nama"><span class="text-danger">*</span> Tanggal Mulai</label>
                    <input wire:model="start" type="date" class="form-control @error('nama')is-invalid @enderror">
                    @error('start')
                        <span class="invalid-feedback">
                                {{ $message }}
                         </span>
                    @enderror
                </div>
                <div class="col-auto">
                    <label class="text-muted" for="nama"><span class="text-danger">*</span> Tanggal Selesai</label>
                    <input wire:model="end" type="date" class="form-control @error('nama')is-invalid @enderror">
                    @error('end')
                        <span class="invalid-feedback">
                                {{ $message }}
                         </span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Ubah</button>
            {{-- <button type="submit" class="btn btn-danger mt-3">Batal</button> --}}
        </div>
    </form>
</div>
