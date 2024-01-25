@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <section class="pt-2 pb-5 text-center container">
                            <div class="row py-lg-5">
                                <div class="col-lg-6 col-md-8 mx-auto">
                                    <h1 class="fw-light">Gallery Landing Page</h1>
                                    <p class="lead text-body-secondary">Something short and leading about the collection
                                        below—its
                                        contents, the creator, etc. Make it short and sweet, but not too short so folks
                                        don’t simply
                                        skip over it entirely.</p>
                                </div>
                            </div>
                        </section>

                        <div class="container pb-5">
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                                @foreach ($gallery as $item)
                                    <div class="col">
                                        <div class="card shadow-sm" style="height: 380px">
                                            <img src={{ asset('ceweku/' . $item->picture) }} alt="girl"
                                                style="height: 250px">
                                            <div class="card-body d-flex flex-column justify-content-between">
                                                <p class="card-text">
                                                    {{ Str::limit($item->caption, 50) }}
                                                </p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex justify-content-between w-100">
                                                        <button type="button" class="btn btn-md btn-outline-primary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#view{{ $item->id }}">
                                                            View
                                                        </button>
                                                        <div class="d-flex align-items-center">
                                                            @guest
                                                                <a href={{ route('login') }} class="btn btn-link ">
                                                                    <x-bi-heart class="h-6 text-danger" />
                                                                </a>
                                                                <div class="fs-5">{{ $item->likeCount() }}</div>
                                                            @endguest
                                                            @auth
                                                                <div>
                                                                    @if (!$item->likedByUser(Auth::id()))
                                                                        <form action="{{ route('like', $item) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            <button type="submit" class="btn btn-link ">
                                                                                <x-bi-heart class="h-6 text-danger" />
                                                                            </button>
                                                                        </form>
                                                                    @elseif ($item->likedByUser(Auth::id()))
                                                                        <form action="{{ route('unlike', $item) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            <button type="submit" class="btn btn-link">
                                                                                <x-bi-heart-fill class="h-6 text-danger" />
                                                                            </button>
                                                                        </form>
                                                                    @endif
                                                                </div>
                                                                <div class="fs-5">{{ $item->likeCount() }}</div>
                                                            @endauth
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @include('admin.modalView')
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
