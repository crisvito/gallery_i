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
                                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- @include('pages.admin.siswa.show', ['siswa' => $item]) --}}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
