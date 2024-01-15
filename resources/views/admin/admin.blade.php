@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center overflow-hidden" style="height: 85vh">
            <div class="col-md-3 position-sticky">
                <div class="card border-0 h-75">
                    @include('admin.sidebar')
                </div>
            </div>
            <div class="col-md-9">
                <div class="d-flex align-items-center justify-content-between p-4">
                    <h1>Gallery</h1>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        add pictures
                    </button>
                    @include('admin.modalForm')
                </div>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 overflow-y-scroll" style="height: 70vh">
                    @foreach ($gallery as $item)
                        <div class="col">
                            <div class="card shadow-sm">
                                <img src={{ asset('ceweku/' . $item->picture) }} alt="girl" style="height: 230px">
                                <div class="card-body">
                                    <p class="card-text">
                                        {{ $item->caption }}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-md btn-outline-primary"
                                                data-bs-toggle="modal" data-bs-target="#view{{ $item->id }}">
                                                View
                                            </button>
                                            <button type="button" class="btn btn-md btn-outline-secondary"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}">
                                                Edit
                                            </button>
                                            <form action={{ route('gallery.destroy', $item->id) }} method="POST"
                                                class="m-0 btn-group">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-md btn-outline-danger" onclick="deleteConfirm(event)"
                                                    type="submit">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('admin.modalEdit')
                        @include('admin.modalView')
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
