@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <main>
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

                            <div class="album py-5 bg-body-tertiary">
                                <div class="container">

                                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                                        @foreach ($gallery as $item)
                                            <div class="col">
                                                <div class="card shadow-sm">
                                                    <img src={{ asset('ceweku/' . $item->picture) }} alt="girl"
                                                        style="height: 230px">
                                                    <div class="card-body">
                                                        <p class="card-text">{{ $item->caption }}</p>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="btn-group">
                                                                <button type="button"
                                                                    class="btn btn-sm btn-outline-secondary">View</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
